@extends('admin.menu')

@section('title','ürünü Düzenle')


@section('content')
    @include('paresial.error')
    <div class="d-flex justify-content-center">
        <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            catId	name	imgpath	number	title	price<hr>

            <div>kategori:
                <select class='form-control my-3' name="cat">
                    @foreach($cats as $cat)
                        <option {{ $product->catId==$cat->id?'selected="selected"':'' }}  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                   old('name')?old('name'):$product->name
                    @endforeach
                </select>
            </div>

            <div>Ürünün Adı (title) :<input class="form-control my-3" type="text" name="name" value="{{ old('name')?old('name'):$product->name }}" required> </div>

{{--            <div id="img" class="border border-secondary" style="padding:0 30px; border-radius:10px ">--}}
{{--                fotoğraf :--}}
{{--                <button id="btnn" class="form-control m-3" onclick="addd();return false;">yeni fotoğraf kutusu ekle +</button>--}}
{{--                <input class="form-control m-3" type="file" name="file1"  required>--}}
{{--            </div>--}}

            <div>Ürunun sayısı :<input class="form-control my-3" type="number" name="number" value="{{ old('number')?old('number'):$product->number }}" required> </div>
            <div>fıyatı :<input class="form-control my-3" type="number" name="price" value="{{ old('price')?old('price'):$product->price }}" required> </div>
            <div>Ürunun Özellikler :<textarea class="form-control my-3" name="title" id="" cols="30" rows="10" placeholder="Özellikler" >{{ old('title')?old('title'):$product->title }}</textarea></div>

            <button class="btn btn-success my-3">
                Tamam
            </button>
        </form>

    </div>


@endsection



<script>
    b=1
    function addd(){
        b=b+1;
        $('#img').append('<input class="form-control m-3" type="file" name="file'+b+'" required>');
    }

</script>
