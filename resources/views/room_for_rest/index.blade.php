@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Danh sách Phòng

                            <a class="btn btn-success" href="{{ route('room_for_rest.create') }}"> Thêm mới</a>

                        </h2>
                    </div>
                </div>
            </div>
            <form action="">
                Chọn khóa
                <select name="id-room">
                    <option value="">
                        tất cả
                    </option>
                    @foreach ($ListKindOfRoom as $item)
                        <option value="{{$item->id }}" @if ($item->id== $LoaiPhong) selected @endif>
                            {{ $item->loai}}
                        </option>
                    @endforeach
                </select>
                <button>ok</button><br><br>
                Trạng thái
                <select name="tinh-trang">
                            <option value=""selected>
                                tất cả
                            </option>
                            <option value="1" @if($trangthai==1) selected @endif>
                                Đang dùng
                            </option>
                            <option value="0"  @if($trangthai==0) selected @endif  >
                                Còn trống
                            </option>
                </select>
                <button>ok</button><br><br>
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
                    <th>Số Phòng</th>
                    <th>loại Phòng</th>
                    <th>Tình Trạng</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($listRoomForRest as $item)
        <tbody>
        <tr>
            <td>{{$item->id_room}}</td>
            <td>{{$item->so_phong}}</td>
            <td>{{$item->loai}}</td>
            <td>{{$item->StatusName}}</td>
                    <td>
                        <form action="{{ route('room_for_rest.destroy', $item->id_room)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('room_for_rest.edit', $item->id_room) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>

                    </td>
                </tr>
            </tbody>
                @endforeach
            </table>
            {{$listRoomForRest->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
