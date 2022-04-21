@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Hóa đơn chi tiết phòng nghỉ

                            <a class="btn btn-success" href="{{ route('detailed_invoice.create') }}"> Thêm mới</a>
                        </h2>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>ID hóa đơn</th>
                    <th>phòng nghỉ</th>
                    <th>loại phòng</th>
                    <th>người tạo hóa đơn</th>
                    <th>giờ bắt đầu</th>
                    <th>giờ kết thúc</th>
                    <th>Tổng giờ nghỉ</th>
                    <th>Số tiền</th>
                    <th> thời gian tạo</th>



                    <th width="280px">Chức năng</th>
                </tr>

                    <tr>
                        <td>{{ $invoicedetailed->id_hdct }}</td>
                        <td>{{ $invoicedetailed->id_hd }}</td>
                        <td>{{ $invoicedetailed->so_phong }}</td>
                        <td>{{ $invoicedetailed->loai }}</td>
                        <td>{{ $invoicedetailed->name }}</td>
                        <td>{{ $invoicedetailed->gio_bat_dau }}</td>
                        <td>{{ $invoicedetailed->gio_ket_thuc }}</td>
                        <?php
                        $sogiay = strtotime(date('Y-m-d H:i:s', strtotime($invoicedetailed->gio_ket_thuc))) - strtotime(date('Y-m-d H:i:s', strtotime($value->gio_bat_dau)));
                        $sogio = $sogiay / 60 / 60;
                        ?>
                        <td><?php if(!$invoicedetailed->gio_ket_thuc==0){
                           echo number_format($sogio, 1);
                        } ?></td>
                        <td>{{ number_format(100000 + ($invoicedetailed->gia * $sogio - $invoicedetailed->gia), 0, '', ',') }} ₫</td>
                        <td>{{ $invoicedetailed->gio_tao }}</td>
                        <td>
                            <form action="{{ route('detailed_invoice.destroy', $invoicedetailed->id_hdct) }}" method="post">
                                <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a class="btn btn-primary"
                                    href="{{ route('detailed_invoice.edit', $invoicedetailed->id_hdct) }}"><i
                                        class="fa fa-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

            </table>

        </div>
    </div>
@endsection
