@extends('layouts.app')

@php
    use App\Models\Cart;
    use App\Models\CartItem;

    $user = Auth::user();
    if ($user) {
        $user_id = $user->id;
        $cart = Cart::where('user_id', $user_id)->first();
    }
@endphp

@section('title', $product->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid mb-3">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p class="lead">Цена: {{ $product->price }} ₽</p>
                <div class="btn-toolbar" role="toolbar">
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
                    <div class="btn-group mr-2" role="group">
                        <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary">Назад в каталог</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
