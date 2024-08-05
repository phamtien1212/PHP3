<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function chiTietSanPham(string $id){
    $sanPham = SanPham::query()->findOrFail($id);

    $listSanPham = SanPham::query()->get();
    return view('clients.sanphams.chitiet', compact('sanPham', 'listSanPham'));
   }

   public function listProduct(Request $request){

      $listCategory = DanhMuc::query()->get();

     
      $search = $request->input('search');
       
        // sử dụng Eloquent 
       $listProduct = SanPham::query()
        ->when($search, function($query, $search){
        return $query->where('ma_san_pham', 'like', "%($search)%")
        ->orwhere('ten_san_pham', 'like', "%($search)%");
        })->get();

      return view('clients.sanphams.listproduct', compact('listCategory','listProduct'));
  }

  public function comment(String $id){
    
  }


}
