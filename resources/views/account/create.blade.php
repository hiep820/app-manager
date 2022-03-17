@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tạo mới admin <a class="btn btn-primary" href="{{ route('account.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('account.store') }}" method="post">
                @csrf
                Tên : <input type="text" name="name" required> <br><br>
                Password : <input type="password" name="password" required> <br>
                Phone : <input type="text" name="phone" required><br>
                Quyền <input type="radio" name="quyen" value="0" >nhân viên <input type="radio" name="quyen" value="1">admin <br>
                <button>Ok</button>
            </form>
        </div>
    </div>
@endsection
