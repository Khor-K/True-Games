@extends('layouts.app')

@section('title', 'О нас')

@section('content')
    <main class="container my-5">
        <div class="jumbotron">
            <h1 class="display-4">Добро пожаловать в <b>True <span class="material-symbols-outlined" style="font-size: 42pt">sports_esports</span> Games</b>!</h1>
            <p class="lead">
                Мы рады представить вам широкий ассортимент игровых приставок и аксессуаров. У нас вы найдете все, что нужно для комфортной игры: отличные приставки, качественные
                контроллеры, наушники, клавиатуры и многое другое.
            </p>
            <hr class="my-4" />
            <p>
                Присоединяйтесь к нашему сообществу игроков уже сегодня!
            </p>

            <div class="container">
                <h3 class="display-6">Новинки компании</h3>

                <div class="slick-slider" style="background-color: white; border-radius: 5px">
                    @foreach ($latestProducts as $product)
                        <a href="{{ route('product.show', $product->id) }}">
                            <div class="slick-slide" style="text-align: center">
                                @if ($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="d-block mx-auto img-fluid" style="max-height: 200px;">                    @endif
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->price }} руб.</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.slick-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endsection
