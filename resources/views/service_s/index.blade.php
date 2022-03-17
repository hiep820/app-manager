@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Dịch vụ

                                <a class="btn btn-success" href="{{ route('service_s.create') }}"> Thêm mới</a></h2>
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
                    <th> Giá</th>
                    <th width="280px">Chức năng</th>
                </tr>
                @foreach ($ListService  as $key => $value)
                <tr>
                    <td>{{ $value->id_dv }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->gia}} ₫</td>
                    <td>
                        <form action="{{ route('service_s.destroy', $value->id_dv)}}"  method="post">
                            <a class="btn btn-info" href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a class="btn btn-primary" href="{{ route('service_s.edit', $value->id_dv) }}"><i class="fa fa-pencil"></i></a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>


                    </td>
                </tr>
                @endforeach
            </table>
            {{$ListService ->appends([
                'search'=>$search,
            ])->links()}}
        </div>
    </div>
@endsection
