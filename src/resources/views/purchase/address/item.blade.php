@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header3')

@section('main')
<div>
    <div>住所の変更</div>
    <form action="{{ route('postAddress', ['id' => $item->id]) }}" method="post">
        @csrf
        <div>郵便番号</div>
        <div><input type="text" name="postcode" value="{{ old('postcode', $delivery->postcode ?? '') }}"></div>
        <div class="form__error">
            @error('postcode')
            {{ $message }}
            @enderror
        </div>
        <div>住所</div>
        <div><input type="text" name="address" value="{{ old('address', $delivery->address ?? '') }}"></div>
        <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
        </div>
        <div>建物名</div>
        <div><input type="text" name="building" value="{{ old('building', $delivery->building ?? '') }}"></div>
        <div><button class="button" type="submit">更新する</button></div>
    </form>
</div>
@endsection