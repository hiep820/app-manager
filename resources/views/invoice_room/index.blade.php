@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Hóa đơn

                                <a class="btn btn-success" href="{{ route('invoice_room.create') }}"> Thêm mới</a></h2>
                    </div>
                </div>
            </div>
            <form action="">


                Tìm kiếm
                <input type="month" value="{{$search}}" name="search">
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
                    <th>Dịch vụ</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th> thời gian tạo</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listhddv as $value)
                <tr>
                    <td>{{ $value ->id_hddv}}</td>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->gia}}</td>
                    <td>{{ $value->so_luong}}</td>
                    <td>{{ $value->gia * $value->so_luong}}₫</td>
                    <td>{{ $value->create_at}}</td>
                    <td>
                        <form action="{{ route('invoice_room.destroy', $value->id_hddv)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('invoice_room.edit', $value ->id_hddv) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$listhddv ->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
