@extends('layouts.app')

@section('title', 'Проверка Email')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Проверка Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новая ссылка была отправлена на ваш адрес') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, проверьте свою почту') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('переотправить') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
