@extends('admin.menu')

@section('title','yeni kullanım ekle')

@section('content')
    @include('paresial.error')
<div class="d-flex justify-content-center">
    <form action="{{ route('users.store') }}" method="post" class="col-lg-6">
        @csrf
        <label class="fomr-control" for="name">Adı:</label>
            <input class="form-control my-3" type="text" name="name" value="{{ old('name') }}" required>
        <label class="fomr-control" for="email">E-posta:</label>
            <input class="form-control my-3" type="email" name="email" value="{{ old('email') }}" required>
        <label class="fomr-control" for="password">Şifre: ( 6 - 12 harf )</label>
            <input class='form-control my-3' type="password" name="password" required>
        <label class="fomr-control" for="roll">rulo:</label>
        <select class='form-control my-3' name="roll">
            <option value="user">user</option>
            <option value="adminn">admin</option>
        </select>
        <button class="btn btn-success my-3">
            tamam
        </button>
    </form>
</div>

@endsection
