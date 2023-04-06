@extends('layouts.app')

@section('title', 'Создать товар')

@section('content')
    <div class="container">
        <h1>Добавить продукт</h1>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control" rows="10" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="image_url">URL изображения</label>
                <input type="text" name="image_url" id="image_url" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
