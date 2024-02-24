@extends('layouts.app')

@section('css')
@endsection

@include('layouts.header')

@section('main')
<div>
    <form action="{{ route('postPurchase', ['id' => $item->id]) }}" method="post">
        <div>
            @csrf
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
            <div>
                <span>配送先</span>
                <span>
                    <a href="{{ route('getAddress', ['id' => $item->id]) }}">変更する</a>
                </span>
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
                <span id="paymentType">
                    @if(old('payment_id'))
                        {{ $payments->where('id', old('payment_id'))->first()->payment }}
                    @else
                        支払い方法の種類
                    @endif
                </span>
            </div>
        </div>
        <div><button class="button" type="submit">購入する</button></div>
    </form>
</div>

<script src="{{ asset('js/payment.js') }}"></script>
@endsection