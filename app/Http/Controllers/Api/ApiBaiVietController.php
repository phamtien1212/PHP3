<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaiVietRequest;
use App\Http\Resources\BaiVietResource;
use App\Models\BaiViet;
use Illuminate\Http\Request;

class ApiBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BaiVietRequest $request)
    {
       $query = BaiViet::query();

       if($request->has('tieu_de')){
        $query->where('tieu_de', 'like', '%' . $request->input('tieu_de') . '%');
       }

       $baiViets = $query->paginate(10);

       return BaiVietResource::collection($baiViets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaiVietRequest $request)
    {
        $params = $request->all();

        if($request->hasFile('hinh_anh')){
            $filepath = $request->file('hinh_anh')->store('uploads/baiviets', 'public');

            $params['hinh_anh'] = $filepath;
        }
       
        $baiViets = BaiViet::create($params);

        return response()->json([
            'data' => new BaiVietResource($baiViets),
            'status' => true,
            'message' => 'Bài viết đã được thêm thành công.'
        ], 201);

      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
