@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
    <div class="container">
        <h1>Корзина</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Товары в корзине</h2>
        @if ($cart->items->isEmpty())
            <p>Корзина пуста.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Итого</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($cart->items as $item)

                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product->price }} руб.</td>
                        <td>{{ $item->product->price * $item->quantity }} руб.</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += $item->product->price * $item->quantity;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td><b>Итого:</b></td>
                    <td>{{ $total }} руб.</td>
                </tr>
                </tbody>
            </table>
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Введите пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Сформировать заказ') }}
                        </button>
                    </div>
                </div>
            </form>
        @endif
        <h2>Заказы</h2>
        @if ($orders->count() === 0)
            <p>У вас пока нет заказов.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->getStatuses()[$order->status] }} {{ $order->cancellation_reason ? " ($order->cancellation_reason)" : "" }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-primary">Просмотреть</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
