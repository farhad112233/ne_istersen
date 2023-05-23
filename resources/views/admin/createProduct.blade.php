@extends('admin.menu')

@section('title','yeni ürün ekle')


@section('content')
    @include('paresial.error')
    <div class="d-flex justify-content-center">
        <form  action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
            @csrf
            <br>
            <div class="mb-5">kategori:
                <select class='form-control my-1' name="cat">
                    @foreach($cats as $cat)
                        <option {{ old('cat')==$cat->id?'selected="selected"':'' }}  value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            {{--            <div>Ürunun Özellikler :<input class="form-control my-1" type="text" name="title" value="{{ old('title') }}" required> </div>--}}
            <div class="mb-5">Ürünün Adı (title) :<input class="form-control my-1" type="text" name="name" value="{{ old('name') }}" required> </div>

            <div  id="img" class="mb-5 border border-secondary" style="padding:0 30px; border-radius:10px ">
                fotoğraf :
                <button id="btnn" class="form-control m-3" onclick="addd();return false;">yeni fotoğraf kutusu ekle +</button>
                <input class="form-control m-3" type="file" name="file1"  required>
            </div>

            <div class="mb-5">Ürunun sayısı :<input class="form-control my-1" type="number" name="number" value="{{ old('number') }}" required> </div>
            <div class="mb-5">fıyatı :<input class="form-control my-1" type="number" name="price" value="{{ old('price') }}" required> </div>
            <div class="mb-5">Ürunun Özellikler :<textarea class="form-control my-1" name="title" id="" cols="30" rows="10" placeholder="Özellikler" ></textarea></div>
            @if(count($cats) > 0)
            <button class="btn btn-success my-1">
                Tamam
            </button>
            @else
                <h3 style="color: red">* loften bir kategori eklein</h3>
                @endif
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
