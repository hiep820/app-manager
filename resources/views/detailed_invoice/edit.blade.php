@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật hóa đơn chi tiết phòng <a class="btn btn-primary" href="{{ route('detailed_invoice.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('detailed_invoice.update', $data->id_hdct) }}" method="post">
                @method('PUT')
                @csrf
                ID hóa đơn :<input type="text" name="hoadon" value="{{ $data->id_hd }}" /><br>
                Giờ kết thúc: <input type="datetime" name="ketthuc" value="{{ $data->gio_ket_thuc }}"><br>
                thời gian tạo : <input type="date" name="tao" value="{{ $data->gio_tao }}"><br>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
