@extends('layouts.app')

@section('title', 'Просмотр товара')

@section('content')
    <div class="container">
        <h1>Просмотр товара</h1>

        <div class="card">
            <div class="card-header">{{ $product->name }}</div>

            <div class="card-body">
                <p>{{ $product->description }}</p>

                <p><strong>Цена:</strong> {{ $product->price }} руб.</p>

                @if ($product->image_url)
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid" style="width: 60%">
                @endif

                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот продукт?')">Удалить</button>
                </form>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Назад</a>
            </div>
        </div>
    </div>
@endsection
