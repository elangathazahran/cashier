@extends('pages.layouts.dashboard')

@section('content__box')
    <div class="content__box">
        <h1 class="title__content-box">List of all products : </h1>
        <a href="{{ route('dashboard.products.create') }}" class="btn btn__primary">+ Tambah product</a>
        <div class="cards__content">
            @foreach ($products as $product)
                <div class="card">
                    <div class="image__card">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="desc__card">
                        <h2 class="title__card-product">{{ $product->name }}</h2>
                        <p class="price">Price : <span>Rp. {{ number_format($product->price, 0, ',', '.') }} -</span></p>
                        <p class="stock">Stock : <span>{{ $product->stock }}</span></p>
                        <div class="btn__group">
                            <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn__warning">Edit</a>
                            <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn__primary">Product detail</a>
                            <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn__danger"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
