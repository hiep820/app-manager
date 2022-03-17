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
                    <th>phòng nghỉ</th>
                    <th>người tạo</th>
                    <th>giờ bắt đầu</th>
                    <th> thời gian tạo</th>

                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($invoice as $value)
                <tr>
                    <td>{{ $value ->id_hd}}</td>
                    <td>{{ $value->so_phong}}</td>
                    <td>{{ $value->name}}</td>
                    <td>{{ $value->gio_bat_dau}}</td>
                    <td>{{ $value->tg_tao}}</td>
                    <td>
                        <form action="{{ route('invoice.destroy', $value->id_hd)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
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
            ])->links()}}
        </div>
    </div>
@endsection
