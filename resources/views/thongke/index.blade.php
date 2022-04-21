@extends('layout.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Thống Kê dịch vụ
                    </div>
                </div>
            </div>
           <form >
               Chọn tên sản phẩm
               <input type="text" value="{{ $ten }}" name="ten">
               Chọn ngày
               <input type="date" value="{{$search}}" name="thang">
               Đến ngày
               <input type="datetime-local" value="{{$thang}}" name="thangg">

               <button>ok</button>

           </form>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>tên sản dịch vụ</th>
                    <th>tổng số lượng đã bán</th>
                    <th>tổng tiền</th>
                    <th>Ngày tạo</th>


                </tr>
                @foreach ($invoicedv as $key=>$value)
                <tr>
                    <td>{{ ++$key}}</td>
                    <td>{{ $value->name}}</td>

                     {{-- @php
                        $sum =\App\Models\invoiceroom::where('id_dv','=',$value->id_dv)
                        ->sum('so_luong');

                    @endphp --}}

                   <td> {{ $value->so_luong }}</td>
                    <td>{{number_format($value->gia * $value->so_luong)}}₫</td>
                    <td>{{$value->create_at}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Tổng</td></td>
                    <td></td>
                    <td>{{$sum}}</td>
                    <td>{{number_format($tong)}}₫</td>

                </tr>
            </table>
            {{$invoicedv->appends([
                'thang'=>$search,
                'thangg'=>$thang,
                'ten'=>$ten
            ])->links()}}
        </div>
    </div>
@endsection

