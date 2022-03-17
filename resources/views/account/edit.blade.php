@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cập nhật nhân viên <a class="btn btn-primary" href="{{ route('account.index') }}"> Trở lại</a></h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('account.update', $account->id) }}" method="post">
                @method('PUT')
                @csrf
                Tên: <input type="text" name="name" value="{{ $account->name }}"><br>
                Password: <input type="password" name="password" value="{{ $account->pass}}"><br>
                Phone: <input type="phone" name="phone" value="{{ $account->phone }}"><br>
                Quyền <input type="radio" name="quyen" value = "0" @if ($account->quyen== 0)
                    checked
                @endif>Nhân viên <input type="radio" name="quyen" value = "1" @if ($account->quyen == 1)
                checked
            @endif>Admin <br>
                <button>Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
