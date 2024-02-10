@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header3')

@section('main')
<div>
    <div>商品の出品</div>
    <div>商品画像</div>
    <form action="{{ route('postSell') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="item-content">
            <!-- 出品画像の表示 -->
            <div class="item"><img src="{{ Storage::url('item/noimage.jpg') }}" alt="Item Image"></div>
            <button class="button" type="button" onclick="document.getElementById('fileInput').click()">画像を選択する</button>
            <input type="file" name="item_url" id="fileInput" onchange="previewImage(event)" style="display: none;" accept="image/*">
        </div>
        <div class="form__error">
            @error('item_url')
            {{ $message }}
            @enderror
        </div>
        <div>商品の詳細</div>
        <div>カテゴリー</div>
        <div>
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>{{ $category->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__error">
            @error('category_id')
            {{ $message }}
            @enderror
        </div>
        <div>商品の状態</div>
        <div>
            <select name="condition_id">
                <option value="">選択してください</option>
                @foreach($conditions as $condition)
                <option value="{{ $condition->id }}" @if(old('condition_id')==$condition->id) selected @endif>{{ $condition->condition }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__error">
            @error('condition_id')
            {{ $message }}
            @enderror
        </div>
        <div>商品名と説明</div>
        <div>商品名</div>
        <div><input type="text" name="itemname" value="{{ old('itemname') }}"></div>
        <div class="form__error">
            @error('itemname')
            {{ $message }}
            @enderror
        </div>
        <div>商品の説明</div>
        <div><textarea name="description">{{ old('description') }}</textarea></div>
        <div class="form__error">
            @error('description')
            {{ $message }}
            @enderror
        </div>
        <div>販売価格</div>
        <div><input type="text" name="price" value="{{ old('price') }}"></div>
        <div class="form__error">
            @error('price')
            {{ $message }}
            @enderror
        </div>
        <div><button class="button" type="submit">出品する</button></div>
    </form>
</div>
<script src="{{ asset('js/item.js') }}"></script>
@endsection