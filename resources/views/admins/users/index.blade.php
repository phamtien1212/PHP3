@extends('layouts.admin')

@section('title')
  Danh sách tài khoản
@endsection

@section('css')
    
@endsection


@section('content')
<div class="container-xxl">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0"> Quản lý tài khoản </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title align-content-center mb-0">Danh sách tài khoản
                    </h5>
                    <a href="{{ route('admins.users.create')}}" class="btn btn-success">Thêm tài khoản</a>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">

                        {{-- Hiển thị thông báo thành công--}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-lable="Close"></button>

                            </div>
                            
                        @endif
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Chức vụ</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $listTaikhoan as $item )
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        {{$item->role == 'Admin' ? 'Admin' : 'User'}}</td>
                                    <td>                                                       
                                        <a href="{{ route('admins.users.edit', $item->id)}}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                        <form action="{{ route('admins.users.destroy', $item->id)}}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Bạn có muốn xóa không?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-white">
                                                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
    
@endsection