@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header3')

@section('main')
<div class="form__content">
    <div class="form__main">
        <div><h2>住所の変更</h2></div>
        <form action="{{ route('postAddress', ['id' => $item->id]) }}" method="post">
            @csrf
            <div>
                <h4>郵便番号</h4>
                <input type="text" name="postcode" value="{{ old('postcode', $delivery->postcode ?? '') }}">
            </div>
            <div class="form__error">
                @error('postcode')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>住所</h4>
                <input type="text" name="address" value="{{ old('address', $delivery->address ?? '') }}">
            </div>
            <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            <div>
                <h4>建物名</h4>
                <input type="text" name="building" value="{{ old('building', $delivery->building ?? '') }}">
            </div>
            <div><button class="button" type="submit">更新する</button></div>
        </form>
    </div>
</div>
@endsection