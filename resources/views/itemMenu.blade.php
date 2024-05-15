@extends('layouts.menu')

@section('container')

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto space-y-12 max-w-screen-xl lg:space-y-20 sm:py-16 lg:px-6">
        <!-- Row -->
        <div class="gap-8 items-center lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="max-h-450px max-w-800px overflow-hidden">
                @if($menu->image)
                    @php
                        $images = json_decode($menu->image, true);
                    @endphp
                    <!-- Display only the first image on larger screens (laptop/desktop) -->
                    @if(count($images) > 0)
                        <img class="p-8 mb-4 w-full lg:mb-0 lg:flex rounded-lg hidden md:block" src="{{ asset('storage/' . $images[0]) }}">
                    @endif
                @endif
            </div>           
            <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white font-abc">{{ $menu->title }}</h2>
                <p class="mb-8 lg:text-xl text-justify">{{ $menu->body }}</p>
                <div class="my-4 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    @auth
                    <button type="button" id="orderModalButton" data-modal-target="orderModal" data-modal-toggle="orderModal" class="text-white mt-4 sm:mt-0 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 flex items-center justify-center">
                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                    </svg>
                        Pesan Sekarang
                    </button>
                    <!-- Main modal -->
                    <div id="orderModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Pesan produk
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="orderModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('order.store') }}" method="post">
                                    @csrf
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div class="sm:col-span-2">
                                            <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                                            <input type="text" name="product" id="product" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" value="{{ $menu->title }}" readonly>
                                        </div>
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" name="name" id="name" class="@error('name') border-red-500 @else border-gray-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                            @error('name')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" value="{{ Auth::user()->email }}" readonly>
                                        </div>                                    
                                        <div>
                                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <input type="text" name="address" id="address" class="@error('address') border-red-500 @else border-gray-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                            @error('address')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
                                            <input type="number" name="phone" id="phone" class="@error('phone') border-red-500 @else border-gray-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
                                            @error('phone')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                            <div class="relative flex items-center max-w-[10rem]">
                                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-l-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="string" name="quantity" id="quantity" data-input-counter aria-describedby="helper-text-explanation" class="@error('quantity') border-red-500 @else border-gray-300 @enderror bg-gray-50 border border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" />
                                                <button type="button" id="increment-button" data-input-counter-increment="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-r-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-2 h-2 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            @error('quantity')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>                                    
                                        <div class="sm:col-span-2">
                                            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Pesanan</label>
                                            <textarea id="desc" name="desc" rows="4" class="@error('desc') border-red-500 @else border-gray-300 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="Write product description here"></textarea>                    
                                            @error('desc')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" id="sendOrders" class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        Pesan
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 ml-2 mt-1 w-4 h-4">
                                            <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                        </svg>                                          
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @else
                    <a href="/login" title="" class="text-white mt-4 sm:mt-0 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 flex items-center justify-center" role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                        </svg>
                            Pesan Sekarang
                        </a>
                    @endauth
                </div>
                <hr class="my-6 md:my-8 border-gray-300 dark:border-gray-800" />
                <p class="font-bold text-black lg:text-md">Untuk informasi mengenai harga dan permintaan lainnya, hubungi kami via WA / telepon.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-12 sm:text-center lg:py-16">
        <h2 class="mb-4 text-4xl font-abc tracking-tight font-extrabold text-gray-900 dark:text-white">Penampilan dari makanan</h2>
        <p class="font-light mb-5 text-gray-500 sm:text-lg md:px-20 lg:px-38 xl:px-48 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates cupiditate natus reiciendis unde cumque, ad aliquam fugit accusantium possimus.</p>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            @if($menu->image)
                @php
                    $images = json_decode($menu->image, true);
                @endphp
                @foreach($images as $image)
                    <img style="height: 230px" class="w-full max-w-full rounded-lg object-cover object-center" src="{{ asset('storage/' . $image) }}">
                @endforeach
            @endif
        </div>        
    </div>
</section>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-12">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white font-abc">Pilihan Menu Lainya</h2>
            <p class="text-gray-500 sm:text-xl dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, quo cupiditate accusamus autem minus consectetur, quis sit, temporibus sapiente perferendis</p>
        </div>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($additionalMenus as $additionalMenu)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('menu.show', $additionalMenu->slug) }}">
                    @if ($additionalMenu->image)
                        @php
                            $images = json_decode($additionalMenu->image, true);
                        @endphp
                        @if(count($images) > 0)
                            <img class="object-cover object-center w-full h-48 rounded-t-lg" src="{{ asset('storage/' . $images[0]) }}">
                        @endif
                    @endif
                </a>
                <div class="p-6">
                    <a href="{{ route('menu.show', $additionalMenu->slug) }}">
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">{{ $additionalMenu->title }}</h3>
                    </a>
                    <p class="text-gray-500 dark:text-gray-400 min-h-20">{{ $additionalMenu->desc }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('menu.show', $additionalMenu->slug) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Lihat Menu</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('sendOrders').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan pengiriman form default

            // Validasi form disini sesuai kebutuhan Anda
            var name = document.getElementById('name').value;
            var address = document.getElementById('address').value;
            var phone = document.getElementById('phone').value;
            var quantity = document.getElementById('quantity').value;
            var desc = document.getElementById('desc').value;
            var error = false;

            // Contoh validasi sederhana, ubah sesuai kebutuhan
            if (name === '') {
                error = true;
            }
            if (address === '') {
                error = true;
            }
            if (phone === '') {
                error = true;
            }
            if (quantity === '') {
                error = true;
            }
            if (desc === '') {
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
</script>

@endsection