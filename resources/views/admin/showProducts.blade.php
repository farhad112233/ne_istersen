@extends('admin.menu')

@section('title','Users List')

@section('content')
    @include('paresial.error')
    @isset($products)
        <table class="table table-hover">
            <tr>
                <th>no</th>
                <th>kategori</th>
                <th>adı</th>
                <th>foto</th>
                <th>sayısı</th>
                <th>Özellikler</th>
                <th>fıyatı</th>
                <th>aksiyon</th>
            </tr>

            @foreach($products as $product)
                    @isset($product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->cat->name }}</td>
                    <td>{{ $product->name }}</td>
                    @php($images=json_decode($product->imgpath))
                    <td>
                        @foreach($images as $image)
                            <img class="adimg" src="{{ '/storage/imgProductTemp/'.$image }}"   alt="">
                        @endforeach
                    </td>
                    <td>{{ $product->number }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ route('product.edit',$product->id) }}" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('product.destroy',$product->id) }}" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                @endisset
            @endforeach
        </table>
        <div class="d-flex justify-content-center pt-2" >
            <div>
                {{ $products->withQueryString()->links()}}
            </div>
        </div>
    @endisset
@endsection
