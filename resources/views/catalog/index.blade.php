@extends('layouts.app')

@section('title', 'Каталог')

@php
    use App\Models\Cart;
    use App\Models\CartItem;

    $user = Auth::user();
    if ($user) {
        $user_id = $user->id;
        $cart = Cart::where('user_id', $user_id)->first();
    }
@endphp

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="d-block mx-auto img-fluid" style="max-height: 200px;"> </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                            </h4>
                            <h5>{{ $product->price }} ₽</h5>
                            <p class="card-text">{{ mb_substr($product->description, 0, 200, 'UTF-8') }}{{ mb_strlen($product->description, 'UTF-8') > 200 ? "..." : "" }}</p>                        </div>
                        <div class="card-footer">
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group mr-2" role="group">
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Подробнее</a>
                                </div>
                                @guest
                                @else
                                    <div class="btn-group mr-2" role="group">
                                        @if ($cart && $cart->items->where('product_id', $product->id)->count() > 0)
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-success">Добавить еще ({{$cart->items->where('product_id', $product->id)->first()->quantity}})</button>
                                            </form>
                                        @else
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-warning">В корзину</button>
                                            </form>
                                        @endif
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
