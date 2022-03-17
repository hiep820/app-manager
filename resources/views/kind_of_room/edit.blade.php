@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật loại phòng <a class="btn btn-primary" href="{{ route('kind_of_room.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('kind_of_room.update', $data->id) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $data->loai }}"><br>

                Loại: <input type="phone" name="gia" value="{{ $data->gia }}"><br>

                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
