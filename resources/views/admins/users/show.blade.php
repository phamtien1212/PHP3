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
                    <h5 class="card-title align-content-center mb-0"> Chi tiết tài khoản : {{$taiKhoan->name}}
                    </h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive">

                        {{-- Hiển thị thông báo thành công--}}
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Trường</th>
                                    <th scope="col">Thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $taiKhoan->toArray() as $column => $value )
                                <tr>  
                                    <td>{{$column}}</td>
                                    <td>{{$value}}</td>
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