@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Phòng nghỉ chi tiết

                            <a class="btn btn-success" href="{{ route('room_detailed.create') }}"> Thêm mới</a>
                        </h2>
                    </div>
                </div>
            </div>
            <form action="">

                Tìm kiếm
                <input type="datetime" value="{{$search}}" name="search">
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
                    <th>Số Phòng</th>
                    <th>Số giờ</th>
                    <th>Số tiền</th>
                    <th>Ghi chú</th>
                    <th>thời gian tạo</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($RoomDetail as $item)
        <tbody>
        <tr>
            <td>{{$item->id_room_detailed}}</td>
            <td>{{$item->so_phong}}</td>
            <td>{{$item->so_gio_nghi}}</td>
            <td>{{$item->gia_tien}}</td>
            <td>{{$item->note}}</td>
            <td>{{$item->create_at}}</td>
                    <td>
                        <form action="{{ route('room_detailed.destroy', $item->id_room_detailed)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('room_detailed.edit', $item->id_room_detailed) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>

                    </td>
                </tr>
            </tbody>
                @endforeach
            </table>
            {{$RoomDetail->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
