@extends('layouts.app')

@section('title', 'Редактирование товара')

@section('content')
    <div class="container">
        <h1>Редактирование товара</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control" rows="10" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="image_url">URL изображения</label>
                <input type="text" name="image_url" id="image_url" class="form-control" value="{{ $product->image_url }}">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Назад</a>
        </form>
    </div>
@endsection
