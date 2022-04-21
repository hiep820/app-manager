@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật phòng <a class="btn btn-primary" href="{{ route('room_detailed.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('room_detailed.update', $RoomDetail->id_room_detailed) }}" method="post">
                @method('PUT')
                @csrf

                Số Phòng:<select name="sophong">
                    @foreach ($ListRoom as $item)
                        <option value="{{ $item->id_room }}" @if ($item->id_room= $RoomDetail->id_phong)
                            chosed
                        @endif>
                            {{ $item->so_phong}}
                        </option>
                    @endforeach
                </select><br>
                Số giờ: <input type="text" name="gio" value="{{ $RoomDetail->so_gio_nghi }}"><br>
                Số tiền: <input type="text" name="tien" value="{{ $RoomDetail->gia_tien }}"><br>
                Ghi chú: <input type="text" name="note" value="{{ $RoomDetail->note }}"><br>
                Thời gian tạo: <input type="datetime-local" name="tg" value="{{ $RoomDetail->create_at }}"><br>

                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
