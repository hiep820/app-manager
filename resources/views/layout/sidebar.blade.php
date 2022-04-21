<div class="sidebar" data-color="blue" data-image="{{ asset('assets') }}/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            Ct
        </a>

        <a href="#" class="simple-text logo-normal">
            BKA
        </a>
    </div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="active">
                <a href="/home">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if (Session::get('quyen'))
                <li>
                    <a href="{{ route('account.index') }}">
                        <i class="pe-7s-study"></i>
                        <p>Quản lý tài khoản </p>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('room_for_rest.index') }}">
                    <i class="pe-7s-study"></i>
                    <p>Quản lý phòng</p>
                </a>
            </li>
            <li>
                <a href="{{ route('service_s.index') }}">
                    <i class="pe-7s-angle-down-circle"></i>
                    <p>Quản lý dịch vụ </p>
                </a>
            </li>
            <li>
                <a href="{{ route('kind_of_room.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Quản lý loại phòng </p>
                </a>
            </li>
            <li>
                <a href="{{ route('invoice.index') }}">
                    <i class="pe-7s-id"></i>
                    <p>quản lý hóa đơn phòng nghỉ</p>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('detailed_invoice.index') }}">
                    <i class="pe-7s-albums"></i>
                    <p>hóa đơn chi tiết phòng nghỉ</p>
                </a>
            </li> --}}
            <li>
            {{-- <li>
                <a href="{{ route('room_detailed.index') }}">

                    <i class="pe-7s-albums"></i>
                    <p> Chi tiết phòng nghỉ</p>
                </a>
            </li>
            <li> --}}
                <a href="{{ route('invoice_room.index') }}">
                    <i class="pe-7s-albums"></i>
                    <p>Quản lý hóa đơn dịch vụ</p>
                </a>
            </li>
            @if (Session::get('quyen'))
                <li>
                    <a href="{{ route('thongke') }}">
                        <i class="pe-7s-albums"></i>
                        <p>thống kê dịch vụ</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('thongke_pn.index') }}">
                        <i class="pe-7s-albums"></i>
                        <p>thống kê phòng nghỉ</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
