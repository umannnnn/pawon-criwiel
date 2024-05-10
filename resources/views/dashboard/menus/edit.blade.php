@extends('layouts.dashboard')

@section('container')
    
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <section class="bg-white dark:bg-gray-900">
            <div class="max-w-3xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update menu makanan</h2>
                <form action="/dashboard/menus/{{ $menu->slug }}" method="post">
                    @method('put')
                    @csrf 
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama menu</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" value="{{ old('title', $menu->title) }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                            <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" value="{{ old('slug', $menu->slug) }}" readonly>
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @if ($categories->count() === 0)
                                    <option value="" disabled selected>Tidak ada kategori</option>
                                @else
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === $menu->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <input type="text" name="desc" id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" value="{{ old('desc', $menu->desc) }}">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                            <input id="body" name="body" type="hidden" value="{{ old('body', $menu->body) }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>
                    <button type="submit" id="updateMenu" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                        Update menu
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/menus/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('updateMenu').addEventListener('click', function(event) {
            event.preventDefault(); // Menghentikan pengiriman form default
            
            // Validasi form disini sesuai kebutuhan Anda
            var title = document.getElementById('title').value;
            var slug = document.getElementById('slug').value;
            var desc = document.getElementById('desc').value;
            var body = document.getElementById('body').value;
            var error = false;
    
            // Contoh validasi sederhana, ubah sesuai kebutuhan
            if (title === '') {
                error = true;
            }
            if (slug === '') {
                error = true;
            }
            if (desc === '') {
                error = true;
            }
            if (body === '') {
                error = true;
            }
    
            if (error) {
                // Jika ada error, tampilkan Sweet Alert error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Silakan lengkapi semua kolom!",
                });
            } else {
                // Submit form secara manual setelah Sweet Alert success ditampilkan
                this.form.submit();
            }
        });
    });
</script>

@endsection