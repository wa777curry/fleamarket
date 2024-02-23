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
        <button id="changePaymentButton" type="button">変更する</button>
    </div>
    <div>
        <select id="paymentSelect" name="payment">
            <option value="">選択してください</option>
            @foreach($payments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->payment}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <span>配送先</span>
        <span>
            <a href="{{ route('getAddress', ['id' => $item->id]) }}">変更する</a>
        </span>
    </div>
    <div>
        @if($delivery)
            <span>{{ $delivery->postcode }}</span>
            <span>{{ $delivery->address }}</span>
            <span>{{ $delivery->building }}</span>
        @else
            <span>配送先情報がありません</span>
        @endif
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
            <div id="paymentInfo">
                <span>支払い方法</span>
                <span id="paymentType">支払い方法の種類</span>
            </div>
        </div>
        <div><button class="button" type="submit">購入する</button></div>
    </form>
</div>

<script src="{{ asset('js/payment.js') }}"></script>
@endsection