@extends('pages.layouts.dashboard')

@section('content__box')
    <div class="content__box">
        <h1>Edit Data Product :</h1>
        <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" class="form__create"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form__content">
                {{-- Cover Image --}}
                <div class="form__input">
                    <input type="file" name="cover_image" class="form__control">
                    <label for="cover_image" class="label__input">Cover Image</label>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Cover Image" width="100">
                    @endif
                    @error('cover_image')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Multiple Images --}}
                <div id="image__container">
                    @foreach($product->images as $image)
                        <div class="form__input">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="Product Image" width="100">
                            <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                            <button type="button" class="btn btn__danger remove-existing-image" data-id="{{ $image->id }}">Hapus</button>
                        </div>
                    @endforeach
                    <div class="form__input">
                        <input type="file" name="images[]" class="form__control">
                        <label class="label__input">Additional Image</label>
                        <button type="button" class="btn btn__danger remove-image" style="display:none;">Hapus</button>
                    </div>
                </div>
                <button type="button" class="btn btn__success" id="add-image">Tambah Gambar</button>
            </div>

            <div class="form__content">
                {{-- Product Name --}}
                <div class="form__input">
                    <input type="text" name="name" class="form__control" required value="{{ old('name', $product->name) }}">
                    <label for="name" class="label__input">Name Product</label>
                    @error('name')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- price --}}
                <div class="form__input">
                    <input type="text" id="price_display" class="form__control price-input" required
                        value="{{ number_format(old('price', $product->price), 0, ',', '.') }}">
                    <input type="hidden" name="price" id="price_hidden" value="{{ old('price', $product->price) }}">
                    <label for="price_display" class="label__input">Harga Produk</label>
                    @error('price')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- stock --}}
                <div class="form__input">
                    <input type="number" name="stock" class="form__control stock-input" required
                        value="{{ old('stock', $product->stock) }}">
                    <label for="stock" class="label__input">Jumlah Stok</label>
                    @error('stock')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>
                
                {{-- Deskripsi Produk --}}
                <div class="form__input">
                    <textarea name="description" class="form__control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                    <label for="description" class="label__input">Deskripsi Produk</label>
                    @error('description')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form__group">
                <a href="/products" class="btn btn__danger">Kembali</a>
                <button class="btn btn__primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>

    {{-- Script untuk tambah/hapus gambar --}}
    <script>
        document.getElementById('add-image').addEventListener('click', function() {
            let container = document.getElementById('image__container');
            let inputGroup = document.createElement('div');
            inputGroup.classList.add('form__input');
            inputGroup.innerHTML = `
            <div class="form__input">
                <input type="file" name="images[]" class="form__control">
                <label class="label__input">Additional Image</label>
                <button type="button" class="btn btn__danger remove-image">Hapus</button>
            </div>
            `;
            container.appendChild(inputGroup);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-image')) {
                e.target.parentElement.remove();
            }
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-existing-image')) {
                let imageId = e.target.getAttribute('data-id');
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_images[]';
                input.value = imageId;
                e.target.parentElement.appendChild(input);
                e.target.parentElement.style.display = 'none';
            }
        });
    </script>
@endsection