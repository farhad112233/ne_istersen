<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="{{ asset('/css3/style.css') }}" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(180deg, #deb432, #d08a1c);
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<div class="m-2 p-2">
    @include('paresial.error')
</div>

<div class="container d-flex flex-column align-items-center">
    <div class="col-12 col-lg-6 p-3 m-3 text-center">
        <h1><a class="text-info font-weight-bold" href="{{ route('home') }}">{{ env('APP_NAME') }}</a></h1>
        <p class="text-light font-weight-bold">
            {{ auth()->user()->name }}<br>
             yeni bir adres ekleyin
        </p>
    </div>
    <div class="col-12 col-lg-6 p-3 m-3 mainn" >
        <form action="{{ route('address.add') }}"  method="post">
            @csrf
            <div class="p-3">il<input class="form-control my-2" type="text" name="province" value="{{ old('province') }}"></div>
            <div class="p-3">ilçe<input class="form-control my-2" type="text" name="district" value="{{ old('district') }}"></div>
            <div class="p-3">address<input class="form-control my-2" type="text" name="address" value="{{ old('address') }}"></div>
            <div class="p-3">posta kodu<input class="form-control my-2" type="number" name="zipCode" value="{{ old('zipCode') }}"></div>
            <div class="p-3">cep telefonu<input class="form-control my-2" type="number" maxlength="10" name="number" value="{{ old('number') }}"></div>
            <div class="p-3"><input class="btn btn-success m-2 px-5" type="submit" name="submit" value="tamam"></div>
        </form>
    </div>

</div>

</body>
</html>
