@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Thêm mới loại phòng <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('invoice.store') }}" method="post">
                @csrf
                Phòng :<select name="phong">
                    @foreach ( $Listphong as $item)
                        <option value="{{ $item->id_room }}">
                            {{ $item->so_phong}}
                        </option>
                    @endforeach
                </select><br><br>
                người tạo :<select name="user">
                    @foreach ( $listUser as $item )
                        <option value="{{ $item->id }}">
                            {{ $item->name}}
                        </option>
                    @endforeach
                </select><br><br>
                giờ bắt đầu: <input type="datetime" name="bt" required value="0000-00-00 00:00:00"><br><br>
                thời gian tạo : <input type="date" name="tao" required><br><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
