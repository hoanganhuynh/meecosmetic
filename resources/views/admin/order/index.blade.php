@if(isset($orderDetails))
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr style="font-weight: bold">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            </thead>

            <tbody>
          
                @foreach($orderDetails as $orderDetail)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="#">{{$orderDetail->getProduct->pr_name}}</a></td>
                        <td>
                            <ul style="list-style: none; padding-left: 0">
                                @if($orderDetail->or_sale > 0)
                                    <li>Giá: {{number_format($orderDetail->getProduct->pr_price,0,',','.')}} VND</li>
                                    <li>Sale: {{$orderDetail->or_sale}}%</li>
                                @else
                                    <li>Giá: {{number_format($orderDetail->or_price,0,',','.')}} VND</li>
                                @endif
                            </ul>
                        </td>
                        <td style="text-align: center">{{$orderDetail->or_quality}}</td>
                        
                        <td>{{number_format($orderDetail->or_quality * $orderDetail->or_price,0,',','.')}} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
