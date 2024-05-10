@extends('layouts.menu')

@section('container')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6 min-h-full">
        
        <div id="default-carousel" class="relative w-full hidden sm:block mt-5" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/gulai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/gulai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/gulai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/gulai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/gulai.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
        </div>      
        
        <div class="mx-auto max-w-screen-sm text-center lg:mt-10">
            <h2 class="mb-4 text-3xl font-abc tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">Gallery Pawon Criwiel</h2>
            <p class="mb-4 font-light text-gray-500 dark:text-gray-400 sm:text-lg">Memberikan cita rasa di setiap hidangan..</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:mt-10">
            @foreach ($galleries as $gallery)
            <div class="relative overflow-hidden bg-gray-300 shadow-md rounded-lg dark:bg-gray-800">
                <img src="{{ asset('storage/' . $gallery->image) }}" class="object-cover w-full h-60" alt="Gallery Image">
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection