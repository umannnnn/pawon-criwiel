@extends('layouts.menu')

@section('container')

<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="font-abc max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Pawon Criwiel Catering</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400 text-justify">Pawon Criwiel catering menyediakan berbagai menu makanan dan pelayanan untuk berbagai acara, mulai dari pertemuan kecil hingga perayaan besar. Pawon Criwiel Catering menghadirkan cita rasa yang autentik dan menyeluruh, menyesuaikan setiap menu dengan kebutuhan dan preferensi pelanggan.</p>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="img/logoPawonCriwiel.png" alt="mockup">
        </div>                
    </div>
</section>

<section class="bg-gray-100 dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center sm:py-16 lg:px-6">
        <h2 class="font-abc mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Layanan Pawon Criwiel Catering</h2>
        <p class="text-gray-500 sm:text-xl dark:text-gray-400">Kelebihan menggunakan layanan Pawon Criwiel Catering</p>
        <div class="mt-10 lg:mt-14 space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0 bg-transparent">
            <div>
                <svg class="mx-auto mb-4 w-12 h-12 text-black dark:text-black" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z"
                        clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                        d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z"
                        clip-rule="evenodd"></path>
                    <path fill-rule="evenodd"
                        d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Kebersihan dan Kualitas</h3>
                <p class="mb-4 text-gray-500 dark:text-gray-400">Kualitas makanan dan kebersihan adalah prioritas utama bagi kami.</p>
            </div>
            <div>
                <svg class="mx-auto mb-4 w-12 h-12 text-black dark:text-black" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd"
                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Pilihan Menu Beragam</h3>
                <p class="mb-4 text-gray-500 dark:text-gray-400">Kami menyediakan lebih dari 50 menu makanan untuk memenuhi beragam selera dan kebutuhan acara.</p>
                <p class="font-bold">*Syarat dan Ketentuan Berlaku</p>
            </div>
            <div>
                <svg class="mx-auto mb-4 w-12 h-12 text-black dark:text-black" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 class="mb-2 text-xl font-bold dark:text-white">Pelayanan Ramah dan Profesional</h3>
                <p class="mb-4 text-gray-500 dark:text-gray-400">Dari pemesanan hingga pengantaran, kami berkomitmen untuk memberikan pelayanan yang terbaik.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900" >
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-8">
            <h2 class="font-abc mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Menu Pawon Criwiel Catering</h2>
            <p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">Berikut ini merupakan pilihan menu makanan dan pelayanan yang telah disediakan oleh pawon criwiel catering</p>
        </div>
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            <a href="/menu" class="px-4 py-2 mx-2 my-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-full dark:bg-gray-800 dark:text-gray-400 hover:bg-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-500">Semua Kategori</a>
            @foreach ($categories as $category)
                <a href="/menu?category={{ $category->slug }}" class="px-4 py-2 my-2 mx-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-full dark:bg-gray-800 dark:text-gray-400 hover:bg-gray-300 dark:hover:bg-gray-700 dark:hover:text-gray-500">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @if ($menus->count() === 0)
                <h2 class="font-abc mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Tidak ada menu</h2>
            @else
            @foreach ($menus as $menu)
                <div class="bg-white rounded shadow dark:bg-gray-800 mx-auto">
                    <a href="/menu/{{ $menu->slug }}" class="block">
                        @if($menu->image)
                            @php
                                $images = json_decode($menu->image, true);
                            @endphp
                            <!-- Display only the first image if exists -->
                            @if(count($images) > 0)
                                <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $menu->title }}" class="w-full h-auto object-cover rounded-t">
                            @else
                                <img src="http://source.unsplash.com/400x400?food" alt="Default Image" class="w-full h-auto object-cover rounded-t">
                            @endif
                        @endif
                        <h3 class="py-4 text-xl font-bold dark:text-white">{{ $menu->title }}</h3>
                        <p class="font-light text-gray-500 dark:text-gray-400">{{ $menu->desc }}</p>
                    </a>
                </div>
            @endforeach
            @endif
        </div>        
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {

    const displayErrorMessage = () => {
            const errorMessage = "{{ session('error') }}"; // Fetch error message from session

            if (errorMessage) {
                Swal.fire({
                    title: "Error",
                    text: errorMessage,
                    icon: "error"
                });
            } else {
                // If there is no error, show success message
                const successMessage = "{{ session('success') }}"; // Fetch success message from session

                if (successMessage) {
                    Swal.fire({
                        title: "Success",
                        text: successMessage,
                        icon: "success"
                    });
                }
            }
        };

        // Call the function to display error message or success message
        displayErrorMessage();
    });
</script>

@endsection