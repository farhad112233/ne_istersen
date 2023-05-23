@extends('admin.menu')

@section('title','Siparişler')

@section('content')
    @include('paresial.error')
    @isset($orders)
        <table class="table table-hover">
            <tr>
                <th>sıra no</th>
                <th>kullancı-id</th>
                <th>ürün</th>
                <th>toplam fıyat</th>
                <th>addres-id/user-id/addres</th>
                <th>durum</th>
            </tr>
            @foreach($orders as $order)
                <?php
                unset($order->created_at,$order->updated_at);
                $adress=implode('-',json_decode($order->adress,true));
                    ?>
                <tr>
                    <th>{{ $order->id }}</th>
                    <th>{{ $order->userId }}</th>
                    <th>pic</th>
                    <th>{{ $order->totalprice }}</th>
                    <th><span>{{ $adress }}</span></th>
                    <th>
{{--                        <div style="min-width: 50px;display: inline">{{ $order->status }}</div>--}}
                        @if($order->status=='not approved')
                            <i class="text-danger fa fa-times" aria-hidden="true"></i>
                        @elseif($order->status=='approval')
                            <i class="text-success fa fa-check" aria-hidden="true"></i>
                        @else
                            <i class="text-info fas fa-question"></i>
                        @endif
                        @if($order->status=='not approved' or $order->status=='approval')
                            <button class="btn btn-info" onclick="location.href='{{  route('order.delete',[$order->id,'change'=> 'not'])  }}';">none</button>
                        @endif
                        @if($order->status=='none' or $order->status=='approval')
                            <button class="btn btn-danger" onclick="location.href='{{  route('order.delete',[$order->id,'change'=> 'rej'])  }}';">redd et</button>
                        @endif
                        @if($order->status=='not approved' or $order->status=='none')
                            <button class="btn btn-success" onclick="location.href='{{  route('order.delete',[$order->id,'change'=> 'acc'])  }}';">kabul et</button>
                        @endif
                    </th>
                </tr>

            @endforeach
        </table>
{{ $orders->links() }}
    @endisset
@endsection
