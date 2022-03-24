@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Hóa đơn chi tiết phòng nghỉ

                                <a class="btn btn-success" href="{{ route('detailed_invoice.create') }}"> Thêm mới</a></h2>
                    </div>
                </div>
            </div>
            <form action="">
                Tìm kiếm
                <input type="text" value="{{$search}}" name="search">
                <button>ok</button>
            </form>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>ID hóa đơn</th>
                    <th>phòng nghỉ</th>
                    <th>loại phòng</th>
                    <th>người tạo hóa đơn</th>
                    <th>giờ bắt đầu</th>
                    <th>giờ kết thúc</th>
                    <th> thời gian tạo</th>
                    <th>Số tiền</th>

                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($invoicedetailed as $value)
                <tr>
                    <td>{{ $value ->id_hdct}}</td>
                    <td>{{ $value ->id_hd}}</td>
                    <td>{{ $value->so_phong}}</td>
                    <td>{{ $value->loai}}</td>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->gio_bat_dau}}</td>
                    <td>{{ $value->gio_ket_thuc}}</td>
                    <td>{{ $value->gio_tao}}</td>
                    <td>{{$sotien}}₫</td>
                    <td>
                        <form action="{{ route('detailed_invoice.destroy', $value->id_hdct)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('detailed_invoice.edit', $value ->id_hdct) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$invoicedetailed ->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
