@extends('layouts.app')
@section('title', '商品詳細')

@section('content')
    @section('maincopy', '商品詳細')

    @if($item !== '')
        <div class="headcopy">商品名</div><hr>
        <div class="text">{{ $item->product_name }}</div>

        <div class="headcopy">商品説明</div><hr>
        <div class="text">{{ $item->product_content }}</div>
    @endif

    <a href="/product"><img src="{{ asset('img/edit.svg') }}" class="add" alt="topへ"></a>
@endsection