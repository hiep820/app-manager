@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Tài khoản

                                <a class="btn btn-success" href="{{ route('kind_of_room.create') }}"> Thêm mới</a></h2>
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
                    <th>Loại Phòng</th>
                    <th> giá</th>

                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($ListKindOfRoom as $value)
                <tr>
                    <td>{{ $value ->id}}</td>
                    <td>{{ $value->loai }}</td>
                    <td>{{ $value->gia}}₫/h</td>
                    <td>
                        <form action="{{ route('kind_of_room.destroy', $value->id)}}"  method="post">
                        <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                        <a class="btn btn-primary" href="{{ route('kind_of_room.edit', $value ->id) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$ListKindOfRoom ->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
