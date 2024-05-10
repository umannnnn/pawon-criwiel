<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pawon Criwiel | {{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="/img/logoPawonCriwiel.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <header>
        <nav class="bg-transparent dark:bg-transparent fixed w-full z-20 top-0 start-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center">
                    <img src="/img/logoPawonCriwiel.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white font-abc">Pawon Criwiel</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @auth
                    <button data-tooltip-target="tooltip-statistics" type="button"
                        class="hidden items-center p-2 text-sm font-medium text-gray-500 rounded-lg lg:inline-flex dark:text-gray-400 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z">
                            </path>
                        </svg>
                    </button>
                    <div id="tooltip-statistics" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        View analytics
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button type="button"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full"
                            src="/img/user.webp" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown">
                        <div class="py-3 px-4">
                            <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                            <span
                                class="block text-sm font-light text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                            @can('isAdmin')
                            <li>
                                <a href="/dashboard/orders"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white" target="_blank">
                                Go to Dashboard</a>
                            </li>
                            @endcan
                        </ul>
                        <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                            <li>
                                <a href="/order"
                                    class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                        class="mr-2 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                                        </path>
                                    </svg>Pesanan Anda</a>
                            </li>
                        </ul>
                        <ul class="py-1 font-light text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="block text-start w-full py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</button>
                                </form>
                            </li>  
                        </ul>
                    </div>
                    @else
                        <a href="/login" class="text-white hover:text-white border border-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Login</a>
                    @endauth
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-500 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="/" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Beranda</a>
                        </li>
                        <li>
                            <a href="menu" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Menu</a>
                        </li>
                        <li>
                            <a href="/about" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
                        </li>
                        <li>
                            <a href="/gallery" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Galeri</a>
                        </li>
                        <li>
                            <a href="/contact" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{-- <nav class="bg-transparent dark:bg-transparent fixed w-full z-20 top-0 start-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/img/logoPawonCriwiel.png" alt="Pawon Criwiel" class="w-10 h-10 rounded-full" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white font-playfair text-white">Pawon Criwiel</span>
            </a>
            <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-500 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                    <li>
                        <a href="/" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Beranda</a>
                    </li>
                    <li>
                        <a href="menu" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Menu Catering</a>
                    </li>
                    <li>
                        <a href="/about" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="/gallery" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Galeri</a>
                    </li>
                    <li>
                        <a href="/contact" class="menu-item block py-2 px-3 md:p-0 text-white font-playfair rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 dark:text-white md:dark:hover:text-gray-500 dark:hover:text-white md:dark:hover:bg-transparent">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <div>
        @yield('container')
    </div>

    <footer class="p-4 md:p-8 lg:p-10 bg-footer">
        <div class="mx-auto max-w-screen-xl text-center">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="/img/logoPawonCriwiel.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-playfair font-semibold whitespace-nowrap text-white">Pawon Criwiel</span>
                </a>
            </div>
            <hr class="my-6 border-white sm:mx-auto dark:border-white lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-white sm:text-center dark:text-gray-400">© 2023 <a href="" class="hover:underline">Pawon Criwiel</a>. All Rights Reserved.
                </span>
                <div class="sm:flex sm:items-center sm:justify-between mt-4 sm:mt-0">
                    <a href="https://www.instagram.com/pawon_criwiel/" target="_blank" class="text-white hover:text-gray-500 dark:hover:text-white">
                        <i class="fa fa-instagram" style="font-size:20px"></i>
                    </a>
                    <a href="https://www.facebook.com/praharini" target="_blank"  class="text-white hover:text-gray-500 dark:hover:text-white ms-5">
                        <i class="fa fa-facebook" style="font-size:20px"></i>
                    </a>
                    <a href="https://wa.me/081641167" target="_blank" class="text-white hover:text-gray-500 dark:hover:text-white ms-5">
                        <i class="fa fa-whatsapp" style="font-size:20px"></i>
                    </a>
                </div>
            </div>        
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</body>
</html>
