@extends('layouts.menu')

@section('container')

<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto -mb-10 lg:py-16">
        <div class="grid items-center gap-8 mb-8 lg:mb-16 lg:gap-12 lg:grid-cols-12">
            <div class="col-span-6 text-center sm:mb-6 lg:text-left lg:mb-0">
                <h1 class="mb-4 text-4xl font-extrabold font-abc leading-none tracking-tight text-gray-900 md:text-5xl xl:text-6xl dark:text-white">Pawon Criwiel Catering</h1>
                <p class="max-w-xl mx-auto mb-6 font-light text-gray-500 lg:mx-0 xl:mb-8 md:text-lg xl:text-xl dark:text-gray-400">Pawon Criwiel Catering adalah penyedia jasa catering yang menyajikan hidangan lezat dan berkualitas tinggi untuk setiap momen spesial Anda. Kami menyediakan layanan katering yang fleksibel dan dapat disesuaikan sesuai dengan kebutuhan acara Anda, sehingga Anda dapat menikmati momen spesial Anda tanpa khawatir tentang detail kuliner</p>
            </div>
            <div class="col-span-6">
                <div id="default-carousel" class="relative w-full lg:block hidden" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/img/tumpengPawon.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/img/liwetPawonn.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/img/nasiKotakPawon.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/img/snackPawon.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-image dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-white dark:text-white font-abc">Latar Belakang</h2>
            <p class="mb-4 text-white dark:text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio odit illo perferendis veniam autem temporibus, animi recusandae quis nisi facere quisquam sint velit in, laboriosam reiciendis esse modi inventore, consectetur molestiae sunt aut eligendi fugit!</p>
        </div>
        <div class="mt-4 font-light text-white dark:text-white sm:text-lg lg:mt-0">
            <p class="mb-4">Track work across the enterprise through an open, collaborative platform. Link issues
                across Jira and ingest data from other software development tools, so your IT support and operations
                teams have richer contextual information to rapidly respond to requests, incidents, and changes.</p>
            <p>Deliver great service experiences fast - without the complexity of traditional ITSM
                solutions.Accelerate critical development work, eliminate toil, and deploy changes with ease, with a
                complete audit trail for every change.</p>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center sm:py-16 lg:px-6">
        <h2 class="mb-4 text-5xl tracking-tight font-extrabold text-gray-900 dark:text-white font-abc">Visi & Misi</h2>
        <p class="text-gray-500 sm:text-xl dark:text-gray-400 lg:px-48">Berikut adalah visi dan misi yang dimiliki oleh Pawon Criwiel Catering.</p>
        <div class="mt-8 lg:mt-16 mb-8 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
            <div>
                <h3 class="mb-4 text-3xl font-bold dark:text-white">Visi</h3>
                <p class="mb-4 text-gray-500 dark:text-gray-400">Menjadi mitra terpercaya dalam setiap momen spesial, dengan menyajikan hidangan berkualitas tinggi yang memenuhi selera dan menghangatkan hati.</p>
            </div>
            <div>
                <h3 class="mb-4 text-3xl font-bold dark:text-white">Misi</h3>
                <p class="mb-4 text-gray-500 dark:text-gray-400">Kami berkomitmen untuk memberikan pelayanan terbaik kepada setiap pelanggan kami dengan menghadirkan beragam menu kreatif dan lezat yang sesuai dengan keinginan dan tema acara mereka. Kami selalu mengutamakan bahan baku berkualitas tinggi untuk menjaga kepuasan dan keamanan konsumen.</p>
            </div>            
        </div>
    </div>
</section>

<section class="bg-image dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h2 class="mb-4 text-5xl font-abc tracking-tight font-extrabold leading-tight text-white dark:text-white">Yuk, Pesan Menunya!</h2>
            <p class="mb-6 font-light text-white dark:text-white md:text-lg">Kami siap membantu Anda dalam menyajikan hidangan lezat dan berkualitas tinggi untuk setiap momen spesial Anda. Pesan menu favoritmu sekarang dan buat momen spesialmu lebih berkesan bersama Pawon Criwiel Catering.</p>
            <a href="/contact" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-7 py-3.5 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Hubungi Sekarang
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>        
        </div>
    </div>
</section>

<div class="py-8 px-4 mx-auto max-w-screen-xl text-center sm:py-16 lg:px-6">
    <blockquote class="text-xl italic font-semibold text-center text-gray-900 dark:text-white">
        <p>"Membuat momen-momen spesial lebih berkesan"</p>
    </blockquote>
</div>

@endsection