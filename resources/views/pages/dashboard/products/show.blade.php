@extends('pages.layouts.dashboard')

@section('content__box')
    <div class="content__show">
        <div class="slider__wrapper">
            <div class="slider-container">
                <!-- Main Slider -->
                <div class="slider-main">
                    @foreach ($product->images as $image)
                        <img src="{{ Storage::url($image->image) }}" alt="{{ $product->name }}">
                    @endforeach
                </div>

                <!-- Thumbnail Slider -->
                <div class="slider-nav">
                    @foreach ($product->images as $image)
                        <img src="{{ Storage::url($image->image) }}" alt="{{ $product->name }}">
                    @endforeach
                </div>
            </div>
            <div class="description__show">
                <h2>{{ $product->name }}</h2>
                <p>
                    Stock : <span>{{ $product->stock }}</span>
                </p>
                <p class="price">
                    Price : <span>Rp {{ number_format($product->price, 0, ',', '.') }} -</span>
                </p>
                <p class="description__product-show">
                    Description:
                    <span>{{ $product->description }}</span>
                </p>
                <a href="{{ route('dashboard.products') }}" class="btn btn__danger">Kembali</a>
            </div>
        </div>
    </div>

@section('script__slick')
    <script>
        $(document).ready(function() {
            $('.slider-main').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });

            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-main',
                dots: false,
                centerMode: false,
                arrows: false,
                focusOnSelect: true
            });
        });
    </script>
@endsection
@endsection
