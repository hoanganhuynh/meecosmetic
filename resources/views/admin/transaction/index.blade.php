@extends('layouts.master')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            Quản lý đơn hàng
        </h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($listTransactions))
                @foreach($listTransactions as $listTransaction)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$listTransaction->getUser->name}}</td>
                        <td>{{number_format($listTransaction->tr_total,0,',','.')}} VND</td>
                        <td>{{$listTransaction->tr_address}}</td>
                        <td>{{$listTransaction->tr_phone_number}}</td>

                        <td class="d-flex">
                            <a class="js-modal-detail" style="text-decoration: none" data-id="{{$listTransaction->id}}" href="{{route('admin.view.transaction',$listTransaction->id)}}">Xem đơn hàng</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
{{--                            Modal detail order--}}
    <div class="modal fade" id="myModalDetail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">CHI TIẾT ĐƠN HÀNG #<b class="transaction-id"></b></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="modal_content">
{{--                    content ajax append--}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('.js-modal-detail').click(function (e) {
                    e.preventDefault();
                     let $this = $(this);
                    let url = $this.attr('href');
                    $('.transaction-id').text('').text($this.attr('data-id'));
                    $('#myModalDetail').modal('show');
                    $.ajax({
                        url: url,
                        }).done(function (result) {
                        // console.log(result);
                        if(result){
                            $('#modal_content').html('').append(result);
                        }
                    });

            });
        });
    </script>
@endsection
