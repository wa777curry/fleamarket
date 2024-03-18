@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header2')

@section('main')
<div class="form__content">
    <div class="form__main">
        <div>
            <h2>商品の出品</h2>
        </div>
        <form action="{{ route('postSell') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="item">
                <h4>商品画像</h4>
            <!-- 出品画像の表示 -->
                <img src="{{ url('img/item/noimage.jpg') }}" alt="Item Image">
                <button class="button" type="button" onclick="document.getElementById('fileInput').click()">画像を選択する</button>
                <input type="file" name="item_url" id="fileInput" onchange="previewImage(event)" style="display: none;" accept="image/*">
            </div>
            <div class="form__error">
                @error('item_url')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h3>商品の詳細</h3>
            </div>
            <div>
                <h4>カテゴリー</h4>
                <select name="category_id">
                    <option value="">選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id')==$category->id) selected @endif>{{ $category->category }}</option>
                    @endforeach
                </select>
                <select name="subcategory_id">
                    <option value="">選択してください</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if(old('subcategory_id')==$subcategory->id) selected @endif>{{ $subcategory->subcategory }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form__error">
                <!-- カテゴリー未選択＆サブカテゴリー選択済 -->
                @if($errors->has('category_id') && !$errors->has('subcategory_id'))
                {{ $errors->first('category_id') }}
                @endif
                <!-- カテゴリー選択済＆サブカテゴリー未選択 -->
                @if(!$errors->has('category_id') && $errors->has('subcategory_id'))
                {{ $errors->first('subcategory_id') }}
                @endif
                <!-- カテゴリー＆サブカテゴリー未選択 -->
                @if($errors->has('category_id') && $errors->has('subcategory_id'))
                {{ $errors->first('category_id') }}
                @endif
            </div>
            <div>
                <h4>商品の状態</h4>
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
            <div>
                <h3>商品名と説明</h3>
            </div>
            <div>
                <h4>商品名</h4>
                <input type="text" name="itemname" value="{{ old('itemname') }}">
            </div>
            <div class="form__error">
                @error('itemname')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>商品の説明</h4>
                <textarea name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h3>販売価格</h3>
            </div>
            <div>
                <h4>販売価格</h4>
                <input type="text" name="price" value="{{ old('price') }}">
            </div>
            <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
            <div><button class="button" type="submit">出品する</button></div>
        </form>
    </div>
</div>
<script src="{{ asset('js/item.js') }}"></script>
@endsection