@extends('layouts.app')
@section('title', 'ECサイト')

@section('content')
    @section('maincopy', '投稿してください')

    <!-- 投稿フォーム -->
    <form action="/product" method="post">
        {{ csrf_field() }}

        @if($errors->has('product_name'))
            <div class="error_msg">{{ $errors->first('product_name') }}</div>
        @endif
        <input type="text" class="form" name="product_name" placeholder="商品名" value="{{ old('product_name') }}">

        @if($errors->has('product_content'))
            <div class="error_msg">{{ $errors->first('product_content') }}</div>
        @endif
        <div>
            <textarea class="form" name="product_content" placeholder="詳細">{{ old('product_content') }}</textarea>
        </div>
        
        <input type="submit" class="create" value="出品">
    </form>

    <!-- 記事描画部分 -->
    @if(count($items) > 0)
        @foreach($items as $item)
            <div class="alert alert-primary" role="alert">
                <a href="/product/{{ $item->id }}" class="alert-link">{{ $item->product_name }}</a>
                <form action="/product/{{ $item->id }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="delete" value="削除">
                </form>
            </div>
        @endforeach
    @else
        <div>商品がありません</div>
    @endif
@endsection

