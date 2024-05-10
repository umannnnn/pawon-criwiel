@extends('layouts.menu')

@section('container')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="px-4 mx-auto max-w-screen-sm text-center lg:px-6 mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white font-abc">Hubungi Kami</h2>
            <p class="font-light text-gray-600 dark:text-gray-400 sm:text-xl">
                Jika Anda memiliki pertanyaan, saran, atau membutuhkan informasi lebih lanjut tentang layanan kami, jangan ragu untuk menghubungi kami. Silakan isi formulir kontak di bawah ini atau hubungi kami melalui telepon atau email yang tersedia.
            </p>
        </div>
        <div class="grid grid-cols-1 lg:gap-8 lg:grid-cols-3">
            <div class="col-span-2 mb-8 lg:mb-0">
                <form action="{{ route('contact.send') }}" method="post" class="grid grid-cols-1 gap-8 mx-auto max-w-screen-md sm:grid-cols-2">
                    @csrf
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                        <input type="text" id="name" name="name" class="@error('name') border-red-500 @else border-gray-300 @enderror block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error ('name')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oops!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') border-red-500 @else border-gray-300 @enderror shadow-sm bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error ('email')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oops!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nomor HP</label>
                        <input type="number" id="phone" name="phone" class="@error('phone') border-red-500 @else border-gray-300 @enderror block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error ('phone')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oops!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pesan</label>
                        <textarea id="message" name="message" rows="6" class="@error('message') border-red-500 @else border-gray-300 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        @error ('message')
                            <div class="mt-1 text-sm text-red-600 dark:text-red-500">
                                <span class="font-medium">Oops!</span> {{ $message }}
                            </div>
                        @enderror
                        <p class="mt-4 text-sm text-gray-500">Diharap untuk memasukan data dengan benar dan valid, dikarenakan balasan dari pertanyaan atau pesan anda akan kami berikan melalui nomor atau email yang anda kirimkan.</p>
                    </div>
                    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-gray-700 sm:w-fit hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kirim pesan</button>
                </form>
            </div>
            <div class="grid grid-cols-1 col-span-1 gap-8 text-center sm:grid-cols-1 lg:grid-cols-1">
                <div>
                    <div class="flex justify-center items-center mx-auto mb-4 w-10 h-10 bg-gray-100 rounded-lg dark:bg-gray-800 lg:h-16 lg:w-16">
                        <svg class="w-5 h-5 text-gray-600 lg:w-8 lg:h-8 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-4.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884zM18 7.118l-8 5.002-8-5.002V14a2 2 0 002 2h12a2 2 0 002-2V7.118z"></path></svg>
                    </div>                    
                    <p class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Email :</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Hubungi kami apabila anda memiliki pertanyaan atau ingin melakukan pemesanan</p>
                    <p class="font-semibold text-blue-600 dark:text-blue-500">pawoncriwiel@gmail.com </p>
                </div>
                <div>
                    <div class="flex justify-center items-center mx-auto mb-4 w-10 h-10 bg-gray-100 rounded-lg dark:bg-gray-800 lg:h-16 lg:w-16">
                        <svg class="w-5 h-5 text-gray-600 lg:w-8 lg:h-8 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                    </div>
                    <p class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Nomor Telepon/Wa :</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Hubungi kami apabila anda memiliki pertanyaan atau ingin melakukan pemesanan</p>
                    <p class="font-semibold text-blue-600 dark:text-blue-500">0816411167</p>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <iframe width="100%" height="50%" id="gmap_canvas" src="https://maps.google.com/maps?q=pawon%20criwiel&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no"></iframe>
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

    displayErrorMessage();
});
</script>

@endsection