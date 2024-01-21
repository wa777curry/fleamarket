@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header3')

@section('main')
<div>
    <div>商品の出品</div>
    <div><button class="button" type="submit">画像を選択する</button></div>
    <div>商品の詳細</div>
    <div>カテゴリー</div>
    <div><input type="text" name="category" value="{{ old('category') }}"></div>
    <div>商品の状態</div>
    <div><input type="text" name="condition" value="{{ old('condition') }}"></div>
    <div>商品名と説明</div>
    <div>商品名</div>
    <div><input type="text" name="itemname" value="{{ old('itemname') }}"></div>
    <div>商品の説明</div>
    <div><textarea name="description">{{ old('description') }}</textarea></div>
    <div>販売価格</div>
    <div>販売価格</div>
    <div><input type="text" name="price" value="¥ {{ old('price') }}"></div>
    <div><button class="button" type="submit">出品する</button></div>
</div>
@endsection