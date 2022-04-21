@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo hóa đơn phòng chi tiết <a class="btn btn-primary" href="{{ route('detailed_invoice.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('detailed_invoice.store') }}" method="post">
                @csrf
                ID hóa đơn :<input type="text" name="hoadon" required ><br><br>
                Thời gian kết thúc : <input type="datetime-local" name="ketthuc" required ><br><br>
                Thời gian tạo : <input type="datetime-local" name="tao" required ><br><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
