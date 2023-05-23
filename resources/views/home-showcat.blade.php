@extends('menu')

@section('title',$catss->name)

@section('content')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">{{ $catss->name }}</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach($catss->product as $pro)
                                    {{--
                                    <?php  if ($loop->index > 2) { break; } ?>
                                --}}
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














    <!-- jewellery  section start
    <div class="jewellery_section">
        <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
            <div class="loader_main">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    -->
@endsection
