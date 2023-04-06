@extends('layouts.app')

@section('title', 'Список товаров')

@section('content')
    <div class="container">
        <h1>Список товаров</h1>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mb-3">Назад</a>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Добавить продукт</a>

        @if (count($products) === 0)
            <p>Нет доступных продуктов.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ mb_substr($product->description, 0, 200, 'UTF-8') }}{{ mb_strlen($product->description, 'UTF-8') > 100 ? "..." : "" }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info">Просмотреть</a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" class="btn-danger" style="border-top-right-radius: 3px; border-bottom-right-radius: 3px;" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот товар?')">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
