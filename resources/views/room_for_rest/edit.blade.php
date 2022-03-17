@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật phòng <a class="btn btn-primary" href="{{ route('room_for_rest.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('room_for_rest.update', $listRoomForRest->id_room) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $listRoomForRest->so_phong }}"><br>
                loại Phòng:<select name="loaiphong">
                    @foreach ($ListKindOfRoom as $item)
                        <option value="{{ $item->id }}" @if ($item->id= $listRoomForRest->loai_phong)
                            chosed
                        @endif>
                            {{ $item->loai}}
                        </option>
                    @endforeach
                </select><br>
                Quyền: <input type="radio" name="tinhtrang" value = "0" @if ($listRoomForRest->tinh_trang== 0)
                    checked
                @endif>Còn trống <input type="radio" name="tinhtrang" value = "1" @if ($listRoomForRest->tinh_trang== 1)
                checked
            @endif>Đang dùng <br>


                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
