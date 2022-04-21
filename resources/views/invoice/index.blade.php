@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Hóa đơn

                                <a class="btn btn-success" href="{{ route('invoice.create') }}"> Thêm mới</a></h2>
                    </div>
                </div>
            </div>
            <form action="">
                Trạng thái
                <select name="thanhtoan">
                            <option value="">
                                tất cả
                            </option>
                            <option value="1" @if($thanhtoan==1) selected @endif>
                                Đã thanh toán
                            </option>
                            <option value="0"  @if($thanhtoan==0) selected @endif  >
                                Chưa thanh toán
                            </option>
                </select>&emsp;&emsp;
                Số phòng
                <input type="text" value="{{$search}}" name="search">&emsp;&emsp;
                Ngày tạo
                <input type="date" value="{{$ngay}}" name="ngay">&emsp;&emsp;
                &emsp;  <button>Tìm kiếm</button>
            </form><br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>phòng nghỉ</th>
                    <th>người tạo</th>
                    <th>giờ bắt đầu</th>
                    <th>Giờ Kết Thúc</th>
                    <th>Số giờ Nghỉ</th>
                    <th>Tổng tiền</th>
                    <th>Thanh toán</th>
                    <th> thời gian tạo</th>

                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($invoice as $value)
                <tr>
                    <td>{{ $value ->id_hd}}</td>
                    <td>{{ $value->so_phong}}</td>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->gio_bat_dau}}</td>
                    <td>{{ $value->gio_ket_thuc }}</td>

                    {{-- <?php
                    $sogiay = strtotime(date('Y-m-d H:i:s', strtotime($value->gio_ket_thuc))) - strtotime(date('Y-m-d H:i:s', strtotime($value->gio_bat_dau)));
                    $sogio = $sogiay / 60 / 60;
                    ?> --}}
                    {{-- <td><?php if(!$value->gio_ket_thuc==0){
                        echo number_format($sogio, 1);
                     } ?></td>
                      <td><?php
                      if(!$value->gio_ket_thuc==0){
                        echo number_format(100000 + ($value->gia * $sogio - $value->gia), 0, '', ',');}
                        else{
                            echo "0";
                        }?>₫</td> --}}


                    <td>{{$value->so_gio}}</td>
                    <td><?php
                        if(!$value->gio_ket_thuc==0){
                       echo number_format(100000 + ($value->gia * $value->so_gio - $value->gia), 0, '', ',');
                    }
                    ?></td>
                    <td>{{ $value->ThanhToanName}}</td>
                    <td>{{ $value->tg_tao}}</td>

                    <td>
                        <form action="{{ route('invoice.destroy', $value->id_hd)}}"  method="post">
                        <a class="btn btn-info" href="{{ route('invoice.show', $value ->id_hd) }}"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('invoice.edit', $value ->id_hd) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$invoice ->appends([
                'search'=>$search,
                'ngay'=>$ngay
            ])->links()}}
        </div>
    </div>
@endsection
