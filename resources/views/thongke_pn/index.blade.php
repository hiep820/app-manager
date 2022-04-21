@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Thống Kê dịch vụ
                    </div>
                </div>
            </div>
            <form >
                Chọn Số phòng
                <input type="text" value="{{ $ten }}" name="ten">
                Chọn ngày
                <input type="date" value="{{$search}}" name="thang">
                Đến ngày
                <input type="datetime-local" value="{{$thang}}" name="thangg">

                <button>ok</button>

            </form>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>ID hóa đơn</th>
                    <th>Số phòng</th>
                    <th>trạng thái</th>
                    <th>tổng số lượng giờ nghỉ</th>
                    <th>tổng tiền</th>
                    <th>Ngày tạo</th>
                    <th>Người tạo</th>
                </tr>
                @foreach ($invoice as $key=>$value)
                <tr>
                    <td>{{ ++$key}}</td>
                    <td>{{ $value->id_hd}}</td>
                    <td>{{ $value->so_phong}}</td>
                    <td>{{ $value->ThanhToanName}}</td>
                    <td>{{$value->so_gio}}</td>
                    <td><?php
                        if(!$value->gio_ket_thuc==0){
                       echo number_format( 100000+($value->gia * $value->so_gio - $value->gia ), 0, '', ',');
                    }else{
                        echo "0";
                    }
                    ?>₫</td>

                    <td>{{ $value->tg_tao}}</td>
                    <td>{{ $value->name}}</td>
                </tr>
                @endforeach
                <tr>

                    <td>Tổng</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$sum}}</td>
                    <td>{{number_format($tong)}}₫</td>

                </tr>

            </table>
            {{$invoice ->appends([
                'thang'=>$search,
                'thangg'=>$thang,
                'ten'=>$ten
            ])->links()}}
        </div>
    </div>
@endsection
