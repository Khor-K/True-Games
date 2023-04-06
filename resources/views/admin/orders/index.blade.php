@extends('layouts.app')

@section('title', 'Заказы пользователей')

@section('content')
    <div class="container">
        <h1>Заказы</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Пользователь</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->getStatuses()[$order->status] }} {{ $order->cancellation_reason ? " ($order->cancellation_reason)" : "" }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Просмотреть</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Назад</a>
@endsection
