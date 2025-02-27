<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $title = "Danh sách đơn hàng";

       $listDonHang = DonHang::query()->orderByDesc('id')->get();

       $trangThaiDonHang = DonHang::TRANG_THAI_DON_HANG;

       $type_huy_don_hang = DonHang::HUY_DON_HANG;

       return view('admins.donhangs.index',compact('listDonHang','trangThaiDonHang', 'title', 'type_huy_don_hang'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Thông tin chi tiết đơn hàng";

        $donHang = DonHang::query()->findOrFail($id);

        $trangThaiDonHang =  DonHang::TRANG_THAI_DON_HANG;
 
        $trangThaiThanhToan = DonHang::TRANG_THAI_THANH_TOAN;

       return view('admins.donhangs.show', compact('title', 'donHang', 'trangThaiDonHang', 'trangThaiThanhToan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $donHang = DonHang::query()->findOrFail($id);

       $currentTrangThai = $donHang->trang_thai_don_hang;

       $newTrangThai = $request->input('trang_thai_don_hang');

       $trangThai = array_keys(DonHang::TRANG_THAI_DON_HANG);

       // khiểm tra nếu đơn hàng đã hủy thì không được thay đổi trạng thái nữa
       if($currentTrangThai === DonHang::HUY_DON_HANG){
        return redirect()->route('admins.donhangs.index')->with('error', 'Đơn hàng đã bị hủy không thể thay đổi trạng thái');
       }

       //kiểm tra nếu trạng thái mới không được nằm sau trạng thái hiện tại
       if(array_search($newTrangThai, $trangThai) < array_search($currentTrangThai, $trangThai)){
        return redirect()->route('admins.donhangs.index')->with('error', 'Không thể cập nhập ngược trạng thái');
       }

       $donHang->trang_thai_don_hang = $newTrangThai;

       $donHang->save();

       return redirect()->route('admins.donhangs.index')->with('success', 'Cập nhập trạng thái thành công.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donHang = DonHang::query()->findOrFail($id);

        if($donHang && $donHang->trang_thai_don_hang == DonHang::HUY_DON_HANG){
            
            $donHang->chiTietDonHang()->delete();

            $donHang->delete();

            return redirect()->back()->with('success', 'Xóa đơn hàng thành công thành công.');
        }

        return redirect()->back()->with('error', 'Không thể xóa được đơn hàng.');
       
        
    }
}
