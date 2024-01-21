@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header3')

@section('main')
<div>
    <div>住所の変更</div>
    <div>郵便番号</div>
    <div><input type="text" name="postcode" value="{{ old('postcode') }}"></div>
    <div>住所</div>
    <div><input type="text" name="address" value="{{ old('address') }}"></div>
    <div>建物名</div>
    <div><input type="text" name="building" value="{{ old('building') }}"></div>
    <div><button class="button" type="submit">更新する</button></div>
</div>
@endsection