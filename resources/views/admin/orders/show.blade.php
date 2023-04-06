@extends('layouts.app')

@section('title', 'Заказ №'. $order->id)

@section('content')
    <div class="container">
        <h1>Заказ №{{ $order->id }}</h1>

        <p>Статус: {{ $order->getStatuses()[$order->status] }} {{ $order->cancellation_reason ? " ($order->cancellation_reason)" : "" }}</p>

        <table class="table">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Итого</th>
            </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }} руб.</td>
                    <td>{{ $item->product->price * $item->quantity }} руб.</td>
                </tr>
                @php
                    $total += $item->product->price * $item->quantity;
                @endphp
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td><b>Итого:</b></td>
                <td>{{ $total }} руб.</td>
            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Изменить статус</a>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-secondary">Назад</a>
@endsection
