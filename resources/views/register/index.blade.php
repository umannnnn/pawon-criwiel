<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="shortcut icon" href="/img/logoPawonCriwiel.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
    <section
        class="bg-[url('http://source.unsplash.com/1920x1080?food')] bg-no-repeat bg-cover bg-center bg-gray-700 bg-blend-multiply bg-opacity-60">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen pt:mt-0">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-20 lg:py-16 lg:grid-cols-12">
                <div class="w-full place-self-center lg:col-span-6">
                    <div class="w-full p-6 mx-auto bg-white rounded-lg shadow dark:bg-gray-800 sm:max-w-xl lg:col-span-6 sm:p-8">
                        <a href="/" class="inline-flex items-center mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                            <img class="w-8 h-8 mr-2" src="/img/logoPawonCriwiel.png"
                                alt="logo">
                            Pawon Criwiel
                        </a>
                        <h1 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Selamat Datang! Daftar Akun
                        </h1>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                            Sudah memiliki akun? <a href="/login"
                                class="font-medium text-gray-600 hover:underline dark:text-gray-500">Login disini</a>.
                        </p>
                        <form class="mt-4 space-y-6 sm:mt-6" action="/register" method="post">
                            @csrf
                            <div class="grid gap-6 sm:grid-cols-1">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                                        class="@error ('name') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    @error('name')
                                    <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                        <span class="font-medium">Oops!</span> {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" 
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" id="email"
                                        class="@error ('email') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="Masukan email" >
                                    @error('email')
                                    <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                        <span class="font-medium">Oops!</span> {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Masukan 5 karakter atau lebih"
                                        class="@error ('password') border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                    @error('password')
                                    <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                        <span class="font-medium">Oops!</span> {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Daftar</button>
                        </form>
                    </div>
                </div>
                <div class="mr-auto place-self-center lg:col-span-6">
                    <img class="hidden mx-auto lg:flex"
                        src="/img/logoPawonCriwiel.png"
                        alt="illustration">
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const displayMessage = () => {
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
        
            displayMessage();
        });
    </script>

</body>

</html>