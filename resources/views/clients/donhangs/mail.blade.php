@component('mail::message')
    # Xác nhận đơn hàng

    xin chào {{$donHang->ten_nguoi_nhan}},

    Cảm ơn bạn đã đặt hàng từ cửa hàng cuar chúng tôi. Đây là thông tin đơn hàng của bạn:

    *** Mã đơn hàng: ** {{$donHang->ma_don_hang}}

    *** Sản phẩm đã đặt: **
    @foreach ($donHang->chiTietDonHang as $chiTiet)
        - {{ $chiTiet->sanPham->ten_san_pham }} x {{ $chiTiet->so_luong}} : {{number_format($chiTiet->thanh_tien)}} VNĐ
    @endforeach

    *** Tổng tiền: ** {{number_format($donHang->tong_tien)}} VNĐ

    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thônd tin giao hàng.

    Cảm ơn đã tin tưởng và mua sắm tại Bookstore!

    Trân trọng!

@endcomponent