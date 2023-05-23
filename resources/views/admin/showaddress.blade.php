@extends('admin.menu')

@section('title','address Listesi')

@section('content')
    @include('paresial.error')
    @isset($address)
        <table class="table table-hover">
            <tr>
                <th>sıra no</th>
                <th>kulanci no</th>
                <th>il</th>
                <th>ilçe</th>
                <th>zip kodu</th>
                <th>address</th>
                <th>cep telefunu</th>
            </tr>
            @foreach($address as $addres)
                <tr>
                    <td>{{ $addres['id'] }}</td>
                    <td>{{ $addres['userId'] }}</td>
                    <td>{{ $addres['province'] }}</td>
                    <td>{{ $addres['city'] }}</td>
                    <td>{{ $addres['zipcode'] }}</td>
                    <td>{{ $addres['adress'] }}</td>
                    <td>{{ $addres['number'] }}</td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection
