@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới phòng <a class="btn btn-primary" href="{{ route('room_detailed.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('room_detailed.store') }}" method="post">
                @csrf
                Số Phòng :<select name="sophong">
                    @foreach ( $ListRoom as $item)
                        <option value="{{ $item->id_room }}">
                            {{ $item->so_phong}}
                        </option>
                    @endforeach
                </select><br><br>
                Số giờ : <input type="text" name="gio" required> <br><br>
                Số tiền : <input type="text" name="tien" required> <br><br>
                Số ghi chú : <input type="text" name="note" required> <br><br>
                Thời gian tạo: <input type="datetime-local" name="tg" required> <br><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
