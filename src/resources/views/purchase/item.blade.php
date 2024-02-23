@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <div>
        <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
    </div>
    <div>
        <div>{{ $item->itemname }}</div>
        <div>{{ $formattedPrice }}</div>
    </div>
    <div>
        <span>支払い方法</span>
        <span>変更する</span>
    </div>
    <div>
        <span>支払い方法の内容</span>
    </div>
    <div>
        <span>配送先</span>
        <span>変更する</span>
    </div>
    <div>
        <span>配送先の内容</span>
    </div>
</div>
<div>
    <form action="{{ route('postPurchase', ['id' => $item->id]) }}" method="post">
        @csrf
        <div>
            <div>
                <span>商品代金</span>
                <span>{{ $formattedPrice }}</span>
            </div>
            <div>
                <span>支払い金額</span>
                <span>{{ $formattedPrice }}</span>
            </div>
            <div>
                <span>支払い方法</span>
                <span>支払い方法の種類</span>
            </div>
        </div>
        <div><button class="button" type="submit">購入する</button></div>
    </form>
</div>
@endsection