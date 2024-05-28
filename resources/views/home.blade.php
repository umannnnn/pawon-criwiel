@extends('layouts.main')

@section('container')
    
    <div class="video-section-container relative" style="max-width: 100%; max-height: 100%; overflow: hidden;">
        <video class="w-full h-full video-custom" autoplay loop muted style="max-width:100%; height:auto;">
            <source src="vid/vid_bg_catering.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 flex items-end">
            <div class="text-center py-20 px-20">
                <p class="text-2xl font-playfair font-light text-white text-start">PAWON CRIWIEL CATERING</p>
                <h1 class="text-4xl font-playfair font-bold text-white">Lebih dari sekedar cita rasa</h1>
            </div>
        </div>
    </div>

    <section class="bg-white dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold font-abc text-gray-900 dark:text-white">Pawon Criwiel Catering</h2>
                <p class="mb-4 font-sans text-justify">Pawon Criwiel Catering menyajikan perpaduan rasa tradisional dan sentuhan modern dalam setiap hidangan. Kami berkomitmen untuk menghadirkan kualitas dan inovasi di setiap kesempatan.</p>
                <p class="font-sans text-justify">Di Pawon Criwiel Catering, setiap hidangan memiliki cerita tersendiri. Kami mengundang Anda untuk menikmati cita rasa kami yang unik dan istimewa.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="/img/home1.jpg" alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="/img/home2.jpg" alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-image dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
            <dl class="grid max-w-screen-md gap-8 mx-auto text-white sm:grid-cols-3 dark:text-white">
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">50+</dt>
                    <dd class="text-white font-bold">Menu Makanan</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">1K+</dt>
                    <dd class="text-white font-bold">Pelanggan</dd>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">10+</dt>
                    <dd class="text-white font-bold">Partner</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto -mb-12 max-w-screen-xl lg:py-16 lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white font-abc">Menu Andalan Pawon Criwiel</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Temukan berbagai pilihan menu menarik, dari sajian klasik yang kaya akan keaslian rasa hingga inovasi kuliner yang menawarkan pengalaman rasa unik untuk memanjakan lidah Anda.</p>
            </div> 
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-2">
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-l-xl h-96 md:h-auto md:w-48 md:rounded-r-none md:rounded-s-lg" src="/img/nasiKotakPawon.png" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nasi Box</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nasi Box dengan sajian lengkap, cita rasa autentik, kenyamanan dan kepraktisan terjamin.</p>
                    </div>
                </div>
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-l-xl h-96 md:h-auto md:w-48 md:rounded-r-none md:rounded-s-lg" src="/img/snackPawon.png" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Snack Box</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Snack Box dengan variasi rasa unik, penyajian menarik, sempurna untuk setiap kesempatan.</p>
                    </div>
                </div>
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-l-xl h-96 md:h-auto md:w-48 md:rounded-r-none md:rounded-s-lg" src="/img/tumpengPawon.png" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nasi Tumpeng</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nasi Tumpeng dengan keindahan tradisi, kekayaan rasa, kebersamaan dalam setiap suapan.</p>
                    </div>
                </div>
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-l-xl h-96 md:h-auto md:w-48 md:rounded-r-none md:rounded-s-lg" src="/img/liwetPawonn.jpg" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nasi Liwet</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Nasi Liwet dengan rasa desa, aroma sedap, pengalaman makan yang mempersatukan.</p>
                    </div>
                </div>
            </div>  
        </div>
    </section>

    <!-- Block start -->
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 mb-8 px-4 mx-auto max-w-screen-xl sm:py-12 lg:px-6 ">
            <h2
                class="mb-6 lg:mb-8 font-abc text-3xl lg:text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">
                Pertanyaan yang Sering Diajukan</h2>
            <div class="mx-auto max-w-screen-md">
                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="text-gray-500 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-1">
                        <button type="button"
                            class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-900 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                            data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                            aria-controls="accordion-flush-body-1">
                            <span>Bagaimana cara memesan catering di Pawon Criwiel?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Anda dapat memesan layanan catering melalui email atau dengan menghubungi kami langsung via telepon/WhatsApp.</p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-2">
                        <button type="button"
                            class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>Apakah saya bisa menyesuaikan menu sesuai dengan keinginan atau kebutuhan tertentu?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Ya, kami menawarkan opsi menu yang dapat disesuaikan sesuai dengan preferensi atau kebutuhan khusus Anda.</p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-3">
                        <button type="button"
                            class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                            aria-controls="accordion-flush-body-3">
                            <span>Apakah ada minimum order untuk layanan catering?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Ya, kami memiliki minimum order yang bergantung pada jenis layanan catering yang dipilih. Untuk informasi lebih lanjut, silakan hubungi tim layanan pelanggan kami.</p>
                        </div>
                    </div>
                    <h2 id="accordion-flush-heading-4">
                        <button type="button"
                            class="flex justify-between items-center py-5 w-full font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-4" aria-expanded="false"
                            aria-controls="accordion-flush-body-4">
                            <span>Bagaimana sistem pembayaran untuk layanan catering?</span>
                            <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-4" class="hidden" aria-labelledby="accordion-flush-heading-4">
                        <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">Kami menerima pembayaran melalui transfer bank atau pembayaran online. Biasanya kami meminta deposit sebesar 50% dari total biaya pada saat pemesanan, dan sisanya dibayar pada hari acara atau sesuai kesepakatan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Block end -->

@endsection