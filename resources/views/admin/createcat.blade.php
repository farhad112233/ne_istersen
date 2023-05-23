@extends('admin.menu')

@section('title','yeni kategori Ekle')

@section('content')
    @include('paresial.error')
    <div class="d-flex justify-content-center">
        <form action="{{ route('cat.store') }}" method="post" class="col-lg-6">
            @csrf
            <label class="fomr-control" for="name">kategori Adı:</label>
                <input class="form-control my-3" type="text" name="name" value="{{ old('name') }}" required>

            <label class="fomr-control" for="email">sıra numarası:</label>
                <input class="form-control my-3" type="number" name="number" value="{{ old('number') }}" required>
            <button class="btn btn-success my-3">
                tamam
            </button>
        </form>
    </div>

@endsection

