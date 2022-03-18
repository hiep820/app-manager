@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tao hóa đơn dịch vụ  <a class="btn btn-primary" href="{{ route('invoice_room.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('invoice_room.store') }}" method="post">
                @csrf
                Dịch vụ :<select name="dichvu">
                    @foreach ( $dichvu as $item)
                        <option value="{{ $item->id_dv }}">
                            {{ $item->name}}
                        </option>
                    @endforeach
                </select><br><br>
                Số lượng: <input type="number" name="soluong" required><br><br>

                Thời gian tạo: <input type="datetime" name="creataat" required value="0000-00-00 00:00:00"><br><br>

                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
