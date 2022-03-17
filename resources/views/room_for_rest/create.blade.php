@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới phòng <a class="btn btn-primary" href="{{ route('room_for_rest.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('room_for_rest.store') }}" method="post">
                @csrf
                Số Phòng : <input type="text" name="name" required> <br><br>
                Loại Phòng :<select name="loaiphong">
                    @foreach ( $ListKindOfRoom as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->loai}}
                        </option>
                    @endforeach
                </select><br>
                Tình Trạng <input type="radio" name="tinhtrang" value="0" >Trống <input type="radio" name="tinhtrang" value="1">đang dùng <br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
