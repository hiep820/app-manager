@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật dịch vụ <a class="btn btn-primary" href="{{ route('invoice_room.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('invoice_room.update', $listhddv->id_hddv) }}" method="post">
                @method('PUT')
                @csrf
                Dịch vụ:<select name="dichvu">
                    @foreach ($dichvu as $item)
                        <option value="{{ $item->id_dv }}" @if ($item->id_dv= $listhddv->id_dv)
                            chosed
                        @endif>
                            {{ $item->name}}
                        </option>
                    @endforeach
                </select><br>
                Số lượng : <input type="text" name="soluong" value="{{ $listhddv->so_luong }}"><br>

                Thời gian tạo : <input type="datetime" name="creataat" value="{{ $listhddv->create_at }}"><br>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
