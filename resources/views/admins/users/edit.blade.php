@extends('layouts.admin')

@section('title')
    {{ $title }}
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
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">

                        <form action="{{ route('admins.users.update', $taiKhoan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên tài khoản:</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $taiKhoan->name }}" placeholder="Tên tài khoản">
                                        @error('name')
                                            <p class="text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Email:</label>
                                        <input type="text" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $taiKhoan->email }}" placeholder="Email">
                                        @error('email')
                                            <p class="text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Hình ảnh:</label>
                                        <input type="file" id="hinh_anh" name="hinh_anh"
                                            class="form-control"
                                            value="{{ $taiKhoan->hinh_anh }}" placeholder="">
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                 
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password:</label>
                                        <input type="text" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ $taiKhoan->password }}" placeholder="Password">
                                        @error('password')
                                            <p class="text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Chức vụ:</label>
                                        <select name="role" id="role" class="form-select">
                                            <option value="" selected> Chọn Chức vụ</option>
                                            <option value="Admin" {{$taiKhoan->role == 'Admin' ? 'selected' : ''}} >Admin</option>
                                            <option value="User" {{$taiKhoan->role == 'User' ? 'selected' : ''}} >User</option>
                                        </select>
                                </div>

                                <div class="d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-primary"> Submit </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
