@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật phòng <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('invoice.update', $hoaDon->id_hd) }}" method="post">
                @method('PUT')
                @csrf
                 Phòng:<select name="phong">
                    @foreach ($Listphong as $item)
                        <option value="{{ $item->id_room }}" @if ($item->id_room= $hoaDon->id_phong)
                            chosed
                        @endif>
                            {{ $item->so_phong}}
                        </option>
                    @endforeach
                </select><br>
                NV Tạo:<select name="user">
                    @foreach ($listUser as $item)
                        <option value="{{ $item->id}}" @if ($item->id= $hoaDon->id_user)
                            chosed
                        @endif>
                            {{ $item->name}}
                        </option>
                    @endforeach
                </select><br>
                Giờ bắt đầu: <input type="datetime" name="bt" value="{{ $hoaDon->gio_bat_dau }}"><br>
                thời gian tạo : <input type="datetime" name="tao" value="{{ $hoaDon->tg_tao }}"><br>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
