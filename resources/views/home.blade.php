@extends('layouts.client')

@section('css')

@endsection

@section('content')
    
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/img/slider/sider1.webp')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <h2 class="slide-title text-light"><span>Nhà Giả Kim</span></h2>
                                        <h4 class="slide-desc text-light">Cuốn sách bán chạy chỉ sau kinh thánh</h4>
                                        <a href="shop.html" class="btn btn-hero">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item end -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/img/slider/slider2.webp')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-2">
                                        <h2 class="slide-title">Dám sống hướng nội<span> và cực kỳ nhạy cảm</span></h2>
                                        <h4 class="slide-desc">Cẩm nang về ranh giới, niềm vui và sự chữa lành</h4>
                                        <a href="shop.html" class="btn btn-hero">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->

                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="{{ asset('assets/client/img/slider/slider6.webp')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-3">
                                        <h2 class="slide-title"><span>Người đua diều</span></h2>
                                        <h4 class="slide-desc">Đôi khi thậm chí chỉ cần một ngày, cũng có thể thay đổi toàn bộ cả cuộc đời…</h4>
                                        <a href="shop.html" class="btn btn-hero">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- single slider item start -->
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- service policy area start -->
        <div class="service-policy">
            <div class="container">
                <div class="policy-block section-padding">
                    <div class="row mtn-30">
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-plane"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Free Shipping</h6>
                                    <p>Free shipping all order</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-help2"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Support 24/7</h6>
                                    <p>Support 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-back"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>Money Return</h6>
                                    <p>30 days for free return</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="policy-item">
                                <div class="policy-icon">
                                    <i class="pe-7s-credit"></i>
                                </div>
                                <div class="policy-content">
                                    <h6>100% Payment Secure</h6>
                                    <p>We ensure secure payment</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Mới</h2>
                            <p class="sub-title">Sản phẩm mới nhất tại cửa hàng</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                           
                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        @foreach ( $listProduct as $item )
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.detai', $item->id) }}">
                                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="{{ route('products.detai', $item->id) }}">{{$item->danhMuc->ten_danh_muc}}</a></p>
                                                </div>
                                             
                                                <h6 class="product-name">
                                                    <a href="{{ route('products.detai', $item->id) }}">{{$item->ten_san_pham}}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">{{number_format($item->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                                    <span class="price-old"><del>{{number_format($item->gia_san_pham, 0, '', '.')}} đ</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                       
                                </div>
                                <div class="tab-pane fade" id="tab2">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        @foreach ( $listProduct as $item )
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.detai', $item->id) }}">
                                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="{{ route('products.detai', $item->id) }}">{{$item->danhMuc->ten_danh_muc}}</a></p>
                                                </div>
                                             
                                                <h6 class="product-name">
                                                    <a href="{{ route('products.detai', $item->id) }}">{{$item->ten_san_pham}}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">{{number_format($item->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                                    <span class="price-old"><del>{{number_format($item->gia_san_pham, 0, '', '.')}} đ</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        @foreach ( $listProduct as $item )
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.detai', $item->id) }}">
                                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="{{ route('products.detai', $item->id) }}">{{$item->danhMuc->ten_danh_muc}}</a></p>
                                                </div>
                                             
                                                <h6 class="product-name">
                                                    <a href="product-details.html">{{$item->ten_san_pham}}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">{{number_format($item->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                                    <span class="price-old"><del>{{number_format($item->gia_san_pham, 0, '', '.')}} đ</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <!-- product item start -->
                                        @foreach ( $listProduct as $item )
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ route('products.detai', $item->id) }}">
                                                    <img class="pri-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                    <img class="sec-img" src="{{ Storage::url($item->hinh_anh) }}" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>new</span>
                                                    </div>
                                                </div>
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <div class="product-identity">
                                                    <p class="manufacturer-name"><a href="{{ route('products.detai', $item->id) }}">{{$item->danhMuc->ten_danh_muc}}</a></p>
                                                </div>
                                             
                                                <h6 class="product-name">
                                                    <a href="{{ route('products.detai', $item->id) }}">{{$item->ten_san_pham}}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">{{number_format($item->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                                    <span class="price-old"><del>{{number_format($item->gia_san_pham, 0, '', '.')}} đ</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản Phẩm Yêu Thích</h2>
                            <p class="sub-title">Sản phẩm có lượt xem và mua nhiều nhất ở cửa hàng</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            @foreach ( $listProduct as $item )
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
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <div class="product-identity">
                                        <p class="manufacturer-name">{{$item->danhMuc->ten_danh_muc}}</p>
                                    </div>
                                 
                                    <h6 class="product-name">
                                        <a href="{{ route('products.detai', $item->id)}}">{{$item->ten_san_pham}}</a>
                                    </h6>
                                    <div class="price-box">
                                        <span class="price-regular">{{number_format($item->gia_khuyen_mai, 0, '', '.')}} đ</span>
                                        <span class="price-old"><del>{{number_format($item->gia_san_pham, 0, '', '.')}} đ</del></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->
        <!-- latest blog area start -->
        <section class="latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">latest blogs</h2>
                            <p class="sub-title">There are latest blog posts</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img1.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Celebrity Daughter Opens Up About Having Her Eye Color Changed</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img2.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Children Left Home Alone For 4 Days In TV series Experiment</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img3.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">Lotto Winner Offering Up Money To Any Man That Will Date Her</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img4.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">People are Willing Lie When Comes Money, According to Research</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="blog-details.html">
                                        <img src="assets/img/blog/blog-img5.jpg" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p>25/03/2019 | <a href="#">Corano</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html">romantic Love Stories Of Hollywood’s Biggest Celebrities</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/1.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/6.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo area end -->


@endsection

@section('js')
    
@endsection