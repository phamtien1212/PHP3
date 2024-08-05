<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaiKhoanRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh mục sản phẩm";

        $listTaikhoan = User::get();

        return view('admins.users.index', compact('title', 'listTaikhoan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm mới tài khoản";


        return view('admins.users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaiKhoanRequest $request)
    {
        if($request->isMethod("POST")){
            $param = $request->except('_token');

            if($request->hasFile('hinh_anh')){
                $filepath = $request->file('hinh_anh')->store('uploads/users', 'public');
            }
            else{
                $filepath = null;
            }

            $param['hinh_anh'] = $filepath;

            User::create($param);

            return redirect()->route('admins.users.index')->with('success', 'Thêm tài khoản thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taiKhoan = User::findOrFail($id);

        return view('admins.users.show', compact('taiKhoan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = " Cập nhập danh mục sản phẩm";

        $taiKhoan = User::findOrFail($id);

        return view('admins.users.edit', compact('title', 'taiKhoan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->isMethod('PUT')){
            $param = $request->except('_token', '_method');

            $taiKhoan = User::findOrFail($id);

            if($request->hasFile('hinh_anh')){
                if($taiKhoan->hinh_anh && Storage::disk('public')->exists($taiKhoan->hinh_anh)){
                    Storage::disk('public')->delete($taiKhoan->hinh_anh);
                }
                $filepath = $request->file('hinh_anh')->store('uploads/users', 'public');
            }
            else{
                $filepath = $taiKhoan->hinh_anh;
            }

            $param['hinh_anh'] = $filepath;

           $taiKhoan->update($param);

            return redirect()->route('admins.users.index')->with('success', 'Cập nhập danh mục thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $taiKhoan = User::findOrFail($id);

        $taiKhoan->delete();

        if($taiKhoan->hinh_anh && Storage::disk('public')->exists($taiKhoan->hinh_anh)){
            Storage::disk('public')->delete($taiKhoan->hinh_anh);
        }

        return redirect()->route('admins.users.index')->with('success', 'Xóa thành công');
    }
}
