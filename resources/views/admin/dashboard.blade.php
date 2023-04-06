@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Панель администратора</div>
                    <div class="card-body">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Список заказов</a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Список товаров</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
