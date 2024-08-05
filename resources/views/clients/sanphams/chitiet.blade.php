@extends('layouts.client')

@section('css')
<style>
  .tab-one{
    img{
        max-width: 300px;
    }
   }
</style>
 
@endsection

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="product-details" />
                                    </div>

                                    @foreach ($sanPham->hinhAnhSanPham as $item )
                                        <div class="pro-large-img img-zoom">
                                            <img src="{{Storage::url($item->hinh_anh)}}" alt="product-details" />
                                        </div>
                                        
                                    @endforeach
                                   
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="{{ Storage::url($sanPham->hinh_anh) }}" alt="product-details" />
                                    </div>
                                    @foreach ($sanPham->hinhAnhSanPham as $item )
                                    <div class="pro-nav-thumb">
                                        <img src="{{Storage::url($item->hinh_anh)}}" alt="product-details" />
                                    </div>          
                                @endforeach
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">Mã sản phẩm: {{$sanPham->ma_san_pham}}</a>
                                    </div>
                                    <h3 class="product-name">{{$sanPham->ten_san_pham}}</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>{{$sanPham->luot_xem}}</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">{{number_format($sanPham->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                        <span class="price-old"><del>{{number_format($sanPham->gia_san_pham, 0, '', '.')}} đ</del></span>
                                    </div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>Số lượng: {{$sanPham->so_luong}}</span>
                                    </div>
                                    <p class="pro-desc">
                                        Mô tả ngắn:
                                        {{$sanPham->mo_ta_ngan}}
                                    </p>
                                  <form action="{{ route('cart.add')}}" method="POST">
                                    @csrf
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1" name="quantity" id="quantityInput"></div>
                                            <input type="hidden" name="product_id" value="{{ $sanPham->id}}">
                                        </div>
                                        <div class="action_link">
                                           <button type="submit" class="btn btn-cart2">Add to cart</button>
                                        </div>
                                    </div>
                                  </form>
                                   
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_one">Mô tả chi tiết</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_two">Bình luận</a>
                                        </li>
                                        <li>
                                            <a data-bs-toggle="tab" href="#tab_three">Bình luận</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">
                                                <p>
                                                    {!! $sanPham->noi_dung !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_two">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>color</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>size</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            @if(auth()->check())
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Bình luận</label>
                                                        <textarea class="form-control" required></textarea>
                                                        <div class="help-block pt-10"><span
                                                                class="text-danger"></span>
                                                           Hãy để lại cảm nhận của bạn về cuốn sách!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Gửi</button>
                                                </div>
                                            </form>
                                            @else
                                            <div class="alert alert-danger" role="alert">
                                                <strong> Đăng nhập để bình luận</strong> click vào đây để <a href="{{ route('login')}}">Đăng nhập</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản Phẩm Mới</h2>
                        <p class="sub-title">các sản phẩm liên quan và sản phẩm mới</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        @foreach ($listSanPham as $item )
                             <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="{{ route('products.detai', $item->id)}}">
                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                </div>
                               <form action="{{ route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <div class="cart-hover">
                                    <button type="submit" class="btn btn-cart2">add to cart</button>
                                </div>
                               </form>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="{{ route('products.detai', $item->id)}}">{{$item->danhMuc->ten_danh_muc}}</a></p>
                                </div>
                                <h6 class="product-name">
                                    <a href="{{ route('products.detai', $item->id)}}">{{ $item->ten_san_pham}}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">{{number_format($sanPham->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                    <span class="price-old"><del>{{number_format($sanPham->gia_san_pham, 0, '', '.')}} đ</del></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->

@endsection
  
@section('js')
<script>
    $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
    $('.pro-qty').append('<span class="inc qtybtn">+</span>');
    $('.qtybtn').on('click', function () {
        var $button = $(this);
        var $input = $button.parent().find('input')
        var oldValue = parseFloat($input.val());

        if($button.hasClass('inc')){
            var newVal = oldValue + 1;
        }else{
            if(oldValue > 1){
                var newVal = oldValue - 1;
            }else{
                var newVal = 1;
            }
        }
        $input.val(newVal);
        
	});

    // xứ lys nếu người dùng nhập số âm
    $('#quantityInput').on('change', function() {
        var value = parseInt($(this).val(), 10);

        if(isNaN(value) || value < 1){
            alert('Số lượng phải lớn hơn hoặc bằng 1.')
            $(this).val(1);
        }
    })
   </script>
@endsection