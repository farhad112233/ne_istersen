@extends('admin.menu')

@section('title','kullanıcıyı düzenle')

@section('content')
    @include('paresial.error')
    <div class="d-flex justify-content-center">
        <form action="{{ route('users.update',$user->id) }}" method="post" class="col-lg-6">
            @csrf
            <label class="fomr-control" for="name">Adı:</label>
            <input class="mb-5 form-control " type="text" name="name" value="{{ $user->name }}" required>
            <label class="fomr-control" for="email">E-posta:</label>
            <input class="mb-5 form-control " type="email" name="email" value="{{ $user->email }}" required>
            <label class="fomr-control" for="password">Şifre: ( 6 - 12 harf )(isteğe bağlı=optional) </label>
            <input class='mb-5 form-control ' type="password" name="password" >
            <label class="fomr-control" for="roll">rulo:</label>
            <select class='mb-5 form-control ' name="roll">
                <option  value="user">user</option>
                <option {{ $user->rol=='adminn'?'selected="selected"':'' }} value="adminn">admin</option>
            </select>
            <button class="btn btn-success my-3">
                tamam
            </button>
        </form>
    </div>

@endsection
