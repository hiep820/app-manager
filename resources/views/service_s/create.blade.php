@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Thêm dịch vụ mới <a class="btn btn-primary" href="{{ route('service_s.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('service_s.store') }}" method="post">
                @csrf
                Tên : <input type="text" name="name" required> <br><br>
                Giá : <input type="text" name="gia" required><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
