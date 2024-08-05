@extends('layouts.client')

@section('css')
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sản Phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding">
        <div class="container">
            <div class="row">
                <!-- sidebar area start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="sidebar-wrapper">
                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">Danh Mục</h5>
                            <div class="sidebar-body">
                                @foreach ($listCategory as $item)
                                    <ul class="shop-categories">
                                        <li><a href="#" class="mb-3">{{ $item->ten_danh_muc }} <span></span></a>
                                        </li>

                                    </ul>
                                @endforeach

                            </div>
                        </div>
                        <!-- single sidebar end -->

                        <!-- single sidebar start -->
                        <div class="sidebar-single">
                            <h5 class="sidebar-title">price</h5>
                            <div class="sidebar-body">
                                <div class="price-range-wrap">
                                    <div class="price-range" data-min="1" data-max="1000"></div>
                                    <div class="range-slider">
                                        <form action="#" class="d-flex align-items-center justify-content-between">
                                            <div class="price-input">
                                                <label for="amount">Price: </label>
                                                <input type="text" id="amount">
                                            </div>
                                            <button class="filter-btn">filter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
                <!-- sidebar area end -->

                <!-- shop main wrapper start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-product-wrapper">
                        <!-- shop product top wrap start -->
                        <div class="shop-top-bar">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                    <form action="{{ route('list.product') }}" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search"
                                                placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit" class="btn btn-secondary" > Tìm
                                                kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- shop product top wrap start -->

                        <!-- product item list wrapper start -->
                        <!-- product single item start -->
                        <div class="row">
                            <div class="col-12">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <!-- product item start -->
                                    @foreach ($listProduct as $item)
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.detai', $item->id) }}">
                                                    <img src="{{ Storage::url($item->hinh_anh) }}" alt="product">
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
                                                    <p class="manufacturer-name">{{ $item->danhMuc->ten_danh_muc }}</p>
                                                </div>

                                                <h6 class="product-name">
                                                    <a
                                                        href="{{ route('products.detai', $item->id) }}">{{ $item->ten_san_pham }}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span
                                                        class="price-regular">{{ number_format($item->gia_khuyen_mai, 0, '', '.') }}
                                                        đ</span>
                                                    <span class="price-old"><del>{{ number_format($item->gia_san_pham, 0, '', '.') }}
                                                            đ</del></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center">
                            <ul class="pagination-box">
                                <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- end pagination area -->
                    </div>
                </div>
                <!-- shop main wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->
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
   </script>
@endsection
