@extends('menu')

@section('title','home')

@section('content')
    @isset($search)
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
{{--                            <h1 class="fashion_taital">{{ $cat->name }}</h1>--}}
                            <div class="fashion_section_2">
                                <div class="row">
                                    @foreach($search as $item)
                                        <?php
                                        /* tedad dar safhe
                                        if ($loop->index > 2) {
                                            break;
                                        }
                                        */
                                        ?>
                                        <div class="col-lg-4 col-sm-6 col-md-6">
                                            <div class="box_main" style="width: 300px">
                                                <h4 class="shirt_text">{{ $item->name }}</h4>
                                                <p class="price_text">Price <span style="color: #262626;">{{ $item->price }} TL</span>
                                                </p>
                                                @php($imgpaths=json_decode($item->imgpath))
                                                <div>
                                                    <div class="pb-3">
                                                        <section class="slider-area slider">
                                                            @foreach($imgpaths as $imgpath)
                                                                <div>
                                                                    <img src="{{ '/storage/imgProductTemp/'.$imgpath}}"
                                                                         width="200" height="200"
                                                                         class="mx-auto text-center">
                                                                </div>
                                                            @endforeach
                                                        </section>
                                                    </div>
                                                </div>
                                                <div class="btn_main">
                                                    <div class="buy_bt">
                                                        <a class="add" id="add2cart" name="{{ $item->id }}"
                                                           href="" onclick="return false">
                                                            sepete ekle
                                                        </a>
                                                    </div>
                                                    <div class="seemore_bt">
                                                        <a href="{{ route('seemore',$item->id) }}">daha fazla gör</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @foreach ($cats as $cat)
        <?php
            if (count($cat['product']) <1) {
               continue;
            }
        ?>
            <div class="fashion_section">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <h1 class="fashion_taital">{{ $cat->name }}</h1>
                                <div class="fashion_section_2">
                                    <div class="row">
                                        @foreach($cat->product as $pro)
                                            <?php
                                            /* tedad dar safhe
                                            if ($loop->index > 2) {
                                                break;
                                            }
                                            */
                                            ?>
                                            <div class="col-lg-4 col-sm-6 col-md-6">
                                                <div class="box_main" style="width: 300px">
                                                    <h4 class="shirt_text">{{ $pro->name }}</h4>
                                                    <p class="price_text">Price <span style="color: #262626;">{{ $pro->price }} TL</span>
                                                    </p>
                                                    @php($imgpaths=json_decode($pro->imgpath))
                                                    <div>
                                                        <div class="pb-3">
                                                            <section class="slider-area slider">
                                                                @foreach($imgpaths as $imgpath)
                                                                    <div>
                                                                        <img src="{{ '/storage/imgProductTemp/'.$imgpath}}"
                                                                             width="200" height="200"
                                                                             class="mx-auto text-center">
                                                                    </div>
                                                                @endforeach
                                                            </section>
                                                        </div>
                                                    </div>
                                                    <div class="btn_main">
                                                        <div class="buy_bt">
                                                            <a class="add" id="add2cart" name="{{ $pro->id }}"
                                                               href="" onclick="return false">
                                                                sepete ekle
                                                            </a>
                                                        </div>
                                                        <div class="seemore_bt">
                                                            <a href="{{ route('seemore',$pro->id) }}">daha fazla gör</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endisset
@endsection
