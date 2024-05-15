@extends('layouts.dashboard')

@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <section class="bg-white dark:bg-gray-900">
            @if(session()->has('error'))
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach(session('error') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="max-w-xl">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah menu makanan baru</h2>
                <form action="/dashboard/menus" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama menu</label>
                            <input type="text" name="title" id="title" class="@error('title') border-red-500 @else border-gray-300 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                            @error ('title')
                                <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">Oops!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                            <input type="text" name="slug" id="slug" class="@error('slug') border-red-500 @else border-gray-300 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" readonly>
                            @error ('slug')
                                <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">Oops!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                @if ($categories->count() === 0)
                                    <option value="" disabled selected>Tidak ada kategori</option>
                                @else
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Gambar</label>
                            <input id="image" type="file" name="image[]" class="@error('image') border-red-500 @else border-gray-300 @enderror form-control block w-full text-sm text-gray-900 border rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" multiple>
                            @error('image')
                                <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">Oops!</span> {{ $message }}
                                </div>
                            @enderror
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <input type="text" name="desc" id="desc" class="@error('desc') border-red-500 @else border-gray-300 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                            @error ('desc')
                                <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">Oops!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                            <textarea id="body" name="body" class="@error('body') border-red-500 @else border-gray-300 @enderror bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"></textarea>
                            @error ('body')
                                <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                    <span class="font-medium">Oops!</span> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" id="sendMenus" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                        Tambah menu
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
    document.getElementById('sendMenus').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan pengiriman form default

            // Validasi form disini sesuai kebutuhan Anda
            var title = document.getElementById('title').value;
            var slug = document.getElementById('slug').value;
            var desc = document.getElementById('desc').value;
            var image = document.getElementById('image').value;
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
            if (image === '') {
                error = true;
            }

            if (error) {
                // Jika ada error, tampilkan Sweet Alert error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Pastikan semua kolom terisi dengan benar!",
                });
            } else {
                // Submit form secara manual
                this.form.submit();
            }
        });
    });

    document.getElementById('image').addEventListener('change', function() {
        const file = this.files[0];
        const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if (!allowedExtensions.exec(file.name)) {
            Swal.fire({
                title: "Error",
                text: "File yang diunggah harus berupa gambar (JPG, JPEG, PNG, GIF)",
                icon: "error"
            });
            this.value = null;
        }
    });

</script>

@endsection