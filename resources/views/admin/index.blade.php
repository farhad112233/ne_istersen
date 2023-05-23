@extends('admin.menu')

@section('title','Dashbord')

@section('content')

<div>
    <pre>
        <ul>
            <li class="fontt">Kullanıcılar sayısı : => {{ $users }}</li>
            <li class="fontt">kategori sayısı     : => {{ $cats }}</li>
            <li class="fontt">Ürünler sayısı      : => {{ $products }}</li>
            <li class="fontt">Sipariş sayısı      : => {{ $orders }}</li>
            <li class="fontt">address sayısı      : => {{ $addresses }}</li>
        </ul>
    </pre>
</div>

@endsection
