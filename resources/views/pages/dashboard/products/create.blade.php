@extends('pages.layouts.dashboard')

@section('content__box')
    <div class="content__box">
        <h1>Buat data product baru :</h1>
        <form action="{{ route('dashboard.products.store') }}" method="POST" class="form__create"
            enctype="multipart/form-data">
            @csrf
            <div class="form__content">
                {{-- Cover Image fungsi utama nya untuk membuat image di card pada halaman index --}}
                <div class="form__input">
                    <input type="file" name="cover_image" class="form__control" required>
                    <label for="cover_image" class="label__input">Cover Image</label>
                    @error('cover_image')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Multiple Images fungsi nya untuk membuat image di slider pada halaman show --}}
                <div id="image__container">
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
                    <input type="text" name="name" class="form__control" required
                        value="{{ old('name') }}">
                    <label for="name" class="label__input">Name Product</label>
                    @error('name')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- price --}}
                <div class="form__input">
                    <input type="text" id="price_display" class="form__control price-input" required
                        value="{{ old('price') }}">
                    <input type="hidden" name="price" id="price_hidden">
                    <label for="price_display" class="label__input">Harga Produk</label>
                    @error('price')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>

                {{-- stock --}}
                <div class="form__input">
                    <input type="number" name="stock" class="form__control stock-input" required
                        value="{{ old('stock') }}">
                    <label for="stock" class="label__input">Jumlah Stok</label>
                    @error('stock')
                        <small class="error__message">{{ $message }}</small>
                    @enderror
                </div>
                
                {{-- Deskripsi Produk --}}
                <div class="form__input">
                    <textarea name="description" class="form__control" rows="4" required>{{ old('description') }}</textarea>
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
    </script>
@endsection

