@extends('layouts.app')

@section('title', 'Редактировать заказ')

@section('content')
    <div class="container">
        <h1>Изменение статуса заказа №{{ $order->id }}</h1>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control">
                    <option value="new" @if ($order->status === 'new') selected @endif>Новый</option>
                    <option value="confirmed" @if ($order->status === 'confirmed') selected @endif>Подтвержденный</option>
                    <option value="cancelled" @if ($order->status === 'cancelled') selected @endif>Отмененный</option>
                </select>
            </div>
            <div class="form-group @if ($order->status !== 'cancelled') d-none @endif">
                <label for="cancellation_reason">Причина отказа</label>
                <textarea name="cancellation_reason" id="cancellation_reason" class="form-control">{{ $order->cancellation_reason }}</textarea>
            </div>
            <script>
                const statusSelect = document.getElementById('status');
                const cancellationReason = document.getElementById('cancellation_reason').parentNode;

                statusSelect.addEventListener('change', () => {
                    if (statusSelect.value === 'cancelled') {
                        cancellationReason.classList.remove('d-none');
                    } else {
                        cancellationReason.classList.add('d-none');
                    }
                });
            </script>
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
