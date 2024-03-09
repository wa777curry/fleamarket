@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div class="purchase__content">
    <form action="{{ route('postPurchase', ['id' => $item->id]) }}" method="post">
        @csrf
        <div class="purchase__content--main">
            <div class="purchase__content--left">
                <div class="purchase__content--item">
                    <div class="purchase__content--item">
                        <img src="{{ $item->item_url }}" alt="{{ $item->itemname }}">
                    </div>
                    <div>
                        <h2>{{ $item->itemname }}</h2>
                        <h3 style="font-weight: normal;">¥{{ $formattedPrice }}</h3>
                    </div>
                </div>
                <div class="purchase__content--menu-text">
                    <h3>支払い方法</h3>
                    <button id="changePaymentButton" type="button">変更する</button>
                </div>
                <div>
                    <select id="paymentSelect" name="payment_id">
                        <option value="">選択してください</option>
                        @foreach($payments as $payment)
                        <option value="{{ $payment->id }}" @if(old('payment_id')==$payment->id) selected @endif>{{ $payment->payment}}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('payment'))
                <div class="form__error">
                    {{ $errors->first('payment') }}
                </div>
                @endif
                <div class="purchase__content--menu-text">
                    <h3>配送先</h3>
                    <a href="{{ route('address', ['id' => $item->id]) }}">
                        <button type="button">変更する</button>
                    </a>
                </div>
                @if($delivery)
                <div>
                    <span>{{ $delivery->postcode }}</span>
                    <span>{{ $delivery->address }}</span>
                    <span>{{ $delivery->building }}</span>
                </div>
                @else
                <div>
                    <span>配送先情報がありません</span>
                </div>
                @if ($errors->has('delivery'))
                <div class="form__error">
                    {{ $errors->first('delivery') }}
                </div>
                @endif
                @endif
            </div>
            <div class="purchase__content--right">
                <div class="purchase__content--right-summary">
                    <div class="purchase__content--right-text">
                        <span>商品代金</span>
                        <span>{{ $formattedPrice }}</span>
                    </div>
                    <div class="purchase__content--right-text">
                        <span>支払い金額</span>
                        <span>{{ $formattedPrice }}</span>
                    </div>
                    <div id="paymentInfo" class="purchase__content--right-text">
                        <span>支払い方法</span>
                        <span id="paymentType">
                            @if(old('payment_id'))
                            {{ $payments->where('id', old('payment_id'))->first()->payment }}
                            @else
                            支払い方法の種類
                            @endif
                        </span>
                    </div>
                </div>
                <div>
                    @if($isPurchased)
                    <p class="alert alert-danger">この商品は購入済みです</p>
                    @elseif($itemPurchased)
                    <p class="alert alert-danger">この商品は売り切れです</p>
                    @elseif($isLoggedIn)
                    <button class="button" type="submit">購入する</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

<script src="{{ asset('js/payment.js') }}"></script>
@endsection