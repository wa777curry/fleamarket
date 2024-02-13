@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
</div>
<div>
    <div>{{ $item->itemname }}</div>
    <div>{{ $formattedPrice }}</div>
    <div>
        <span><img src="{{ Storage::url('image/star.jpg') }}"> {{ $item->comments->count() }}</span> <!-- あとでcomments→likesに直す -->
        <span><img src="{{ Storage::url('image/comment.jpg') }}"> {{ $item->comments->count() }}</span>
    </div>
    <div><button class="button" type="submit">購入する</button></div>
    <div>商品説明</div>
    <div>{{ $item->description }}</div>
    <div>商品の情報</div>
    <div>
        <span>カテゴリー</span>
        <span>{{ $item->category->category }}</span>
        <span>{{ $item->subcategory->subcategory }}</span>
    </div>
    <div>
        <span>商品の状態</span>
        <span>{{ $item->condition->condition }}</span>
    </div>
</div>
@endsection