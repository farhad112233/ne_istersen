@extends('admin.menu')

@section('title','kategoriyi düzenle')

@section('content')
    @include('paresial.error')
    <div class="d-flex justify-content-center">

        <form action="{{ route('cat.update',$cat->id) }}" method="post" class="col-lg-6">
            @csrf
            <label class="fomr-control" for="name">kategori Adı:</label>
            <input class="form-control my-3" type="text" name="name" value="{{ $cat->name }}" required>

            <label class="fomr-control" for="email">sıra numarası:</label>
            <input class="form-control my-3" type="number" name="number" value="{{ $cat->sort }}" required>
            <button class="btn btn-success my-3">
                update
            </button>
        </form>
    </div>

@endsection

