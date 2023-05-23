@extends('menu')

@section('title','dashbord')

@section('content')

    {{--  content   --}}
    <div class="d-flex flex-wrap box_main" style="min-height:80vh;margin:50px 10px 10px 10px; ">
        <div class="m-2">
            @if(isset($orders) && count($orders)>0)

                @foreach($products as $key=>$product)
                    <div class="m-2">
                        <div class="imgtogle">
                            @foreach ($product as $item)
                                    @php($picnames=json_decode($item))
                                    <img class="imageee" src="{{ '/storage/imgProductTemp/'.$picnames[0] }}" alt="">
                            @endforeach
                        </div>
                        <div>{{ $orders[$key]['created_at'] }}</div> <!-- tarih -->

                    </div>
                @endforeach
            @else
                <div style="font-size: 3rem">
                    Siparişiniz bulunamadı
                </div>
                <div><a href="{{ route('home') }}">Alışverişe Devam Et</a></div>
            @endif
        </div>

    </div>


@endsection
