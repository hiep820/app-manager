@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo hóa đơn phòng <a class="btn btn-primary" href="{{ route('invoice.index') }}"> Trở lại</a></h2>
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
                người tạo :<input type="text" name="user"value= "{{ Session::get('id') }}"readonly><br><br>
                giờ bắt đầu: <input type="datetime" name="bt" required value="0000-00-00 00:00:00"><br><br>
                Thanh toán: <input type="radio" name="thanhtoan" value="0" >Chưa thanh toán <input type="radio" name="thanhtoan" value="1">đã thanh toán <br>
                thời gian tạo : <input type="date" name="tao" required ><br><br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
