@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật dịch vụ <a class="btn btn-primary" href="{{ route('service_s.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('service_s.update', $data->id_dv) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $data->name }}"><br>

                Giá: <input type="phone" name="gia" value="{{ $data->gia }}"><br>

                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
