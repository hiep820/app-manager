@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tài khoản

                                <a class="btn btn-success" href="{{ route('account.create') }}"> Thêm mới</a></h2>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th> Phone</th>
                    <th>Quyền</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($ListAccount as $value)
                <tr>
                    <td>{{ $value ->id}}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->QuyenName }}</td>
                    <td>
                        <form action="{{ route('account.destroy', $value->id)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('account.edit', $value ->id) }}"><i class="fa fa-pencil"></i></a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$ListAccount ->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
