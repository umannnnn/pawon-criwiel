@extends('layouts.menu')

@section('container')

<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16 min-h-full">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl font-abc">Pesanan Anda</h2>
        <div class="border my-5 border-gray-200 dark:border-gray-700 ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="me-3">
                    <a href="#" id="tab-semua" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group active-tab">
                        <!-- SVG icon -->
                        </svg>Semua
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" id="tab-belum-bayar" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                        <!-- SVG icon -->
                        Menunggu Konfirmasi
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" id="tab-dikonfirmasi" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                        <!-- SVG icon -->
                        Dikonfirmasi
                    </a>
                </li>
                <li class="me-3">
                    <a href="#" id="tab-selesai" class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                        <!-- SVG icon -->
                        Selesai
                    </a>
                </li>
            </ul>
        </div>
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                <div class="space-y-6">
                    @if ($orders->isEmpty())
                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                        <p class="text-base font-medium text-gray-900 dark:text-white">Tidak ada pesanan</p>
                    </div>
                    @endif
                    @foreach ($orders as $order)
                    <div class="order-item rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6
                        @if ($order->status == 'Menunggu konfirmasi')
                            belum-bayar
                        @elseif ($order->status == 'Dikonfirmasi')
                            dikonfirmasi
                        @elseif ($order->status == 'Sedang diproses')
                            sedang-diproses
                        @elseif ($order->status == 'Selesai')
                            selesai
                        @endif
                        ">
                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                            <label for="counter-input" class="sr-only">Choose quantity:</label>
                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                <div class="text-end">
                                    @if ($order->status == 'Menunggu konfirmasi')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Pesanan Belum Dikonfirmasi</span>
                                    @elseif ($order->status == 'Dikonfirmasi')
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Pesanan Dikonfirmasi</span>
                                    @elseif ($order->status == 'Sedang diproses')
                                    <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-300 border border-purple-300">Pesanan Sedang Diproses</span>
                                    @elseif ($order->status == 'Selesai')
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-300 border border-blue-300">Pesanan Selesai</span>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-lg">
                                <p class="text-base font-medium text-gray-900 dark:text-white">{{ $order->product }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->desc }}</p>
                                <div class="flex items-center gap-4">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 mb-4 px-3 py-3 rounded-full dark:bg-gray-700 dark:text-gray-300">Invoice : {{ $order->invoice }}</span>
                                    @if ($order->status == 'Dikonfirmasi' && $order->payment_proof === null)
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 mb-4 px-3 py-3 rounded-full dark:bg-gray-700 dark:text-gray-300">Total : Rp {{ number_format($order->price, 0, ',', '.') }}</span>
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 mb-4 px-3 py-3 rounded-full dark:bg-gray-700 dark:text-red-300">Belum Dibayar</span>
                                    @elseif ($order->status == 'Dikonfirmasi' && $order->payment_proof !== null)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 mb-4 px-3 py-3 rounded-full dark:bg-gray-700 dark:text-green-400">Sudah Dibayar</span>
                                    @endif
                                    @if ($order->status == 'Menunggu konfirmasi')
                                    <form action="/order/{{ $order->id }}" method="post" class="delete-form flex items-center gap-4">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="inline-flex items-center text-sm font-medium text-red-600 rounded-full px-5 py-2.5 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                            Hapus Pesanan
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Kirim Bukti Transfer</p>
                    <hr class="border-gray-200 dark:border-gray-700 w-full" />
                    @if ($orders->isEmpty())
                    <p class="text-base font-medium text-gray-900 dark:text-white">Tidak ada pesanan</p>
                    @else
                    <form class="confirm-form" action="/order/{{ $order->id }}/confirm" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="space-y-4">
                            <label for="order" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Pesanan</label>
                            <select id="order" name="order" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($orders as $order)
                                    @if ($order->status == 'Dikonfirmasi' && $order->payment_proof === null && $order->price !== null)
                                        <option value="{{ $order->id }}">{{ $order->invoice }}</option>
                                    @endif                            
                                @endforeach
                            </select>
                            <div class="flex items-center justify-center w-full">
                                <label for="payment_proof" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">File should be JPG, JPEG, PNG (max 5MB)</p>  
                                    </div>
                                    <input type="file" name="payment_proof" id="payment_proof" class="hidden" />
                                </label>
                            </div> 
                            <div class="image-holder flex items-center justify-center w-full bg-gray-50 dark:bg-gray-700 rounded-lg mt-5"></div>
                            <div class="space-y-2">   
                                <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-500">
                                    Kirim
                                </button>
                            </div>
                            <div class="space-y-2 text-center">
                                <a data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-sm text-blue-500 dark:text-blue-400 cursor-pointer underline">"Cek Syarat dan Ketentuan"</a>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Syarat dan Ketentuan
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400">
                                    <li>
                                        Belum Dikonfirmasi
                                        <ol class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                                            <li>Pada tahap ini pesanan anda sedang dalam pengecekan oleh admin</li>
                                            <li>Pesanan akan segera dikonfirmasi oleh admin apabila pesanan memungkinakan untuk diproses</li>
                                            <li>Pesanan masih dapat dibatalkan apabila terdapat kesalahan</li>
                                        </ol>
                                    </li>
                                    <li>
                                        Dikonfirmasi
                                        <ul class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                                            <li>Pada tahap ini pesanan anda sudah dikonfirmasi oleh admin</li>
                                            <li>Tunggu hingga admin menambahkan total harga yang harus dibayar</li>
                                            <li>Anda diharapkan untuk segera melakukan pembayaran apabila total harga sudah muncul</li>
                                            <li>
                                                Pastikan bukti transfer yang diunggah sudah benar, Kesalahan dalam pembayaran dapat menyebabkan pesanan anda tidak diproses
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        Sedang Diproses
                                        <ul class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                                            <li>Pada tahap ini pesanan anda sedang diproses oleh pemilik catering</li>
                                            <li>Proses pembuatan pesanan membutuhkan waktu, anda akan dihubungi melalui whatsapp atau email apabila pesanan sudah selesai</li>
                                            <li>Anda diharapkan untuk tetap menghubungi admin apabila terdapat kendala</li>
                                        </ul>
                                    </li>
                                    <li>
                                        Selesai
                                        <ul class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                                            <li>Pada tahap ini pesanan anda sudah selesai</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    // Function to handle displaying error message if any
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

    const confirmForms = document.querySelectorAll('.confirm-form');

    confirmForms.forEach(confirmForm => {
        confirmForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting normally

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: true
            });

            swalWithBootstrapButtons.fire({
                title: "Apakah Bukti Transfer Sudah Benar?",
                text: "Anda tidak akan dapat mengembalikannya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, kirim!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Here you can put your AJAX request or form submission if you want to handle it separately
                    confirmForm.submit(); // Submit form after confirmation
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Do nothing if the user cancels
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Fungsi untuk menampilkan pesanan berdasarkan status
        function filterOrders(status) {
            const orderItems = document.querySelectorAll('.order-item');
            orderItems.forEach(item => {
                if (item.classList.contains(status) || status === 'semua') {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Event listener untuk setiap tab
        document.getElementById('tab-semua').addEventListener('click', function() {
            filterOrders('semua');
            setActiveTab('tab-semua');
        });

        document.getElementById('tab-belum-bayar').addEventListener('click', function() {
            filterOrders('belum-bayar');
            setActiveTab('tab-belum-bayar');
        });

        document.getElementById('tab-dikonfirmasi').addEventListener('click', function() {
            filterOrders('dikonfirmasi');
            setActiveTab('tab-dikonfirmasi');
        });

        document.getElementById('tab-sedang-diproses').addEventListener('click', function() {
            filterOrders('sedang-diproses');
            setActiveTab('tab-sedang-diproses');
        });

        document.getElementById('tab-selesai').addEventListener('click', function() {
            filterOrders('selesai');
            setActiveTab('tab-selesai');
        });

        // Fungsi untuk mengatur tab yang aktif
        function setActiveTab(tabId) {
            const tabs = document.querySelectorAll('a');
            tabs.forEach(tab => {
                tab.classList.remove('active-tab');
            });
            document.getElementById(tabId).classList.add('active-tab');
        }

        // Menampilkan semua pesanan saat halaman dimuat
        filterOrders('semua');
    });

    document.getElementById('order').addEventListener('change', function() {
        var selectedOrderId = this.value;
        document.getElementById('selected_order_id').value = selectedOrderId;
    });

    document.getElementById('payment_proof').addEventListener('change', function() {
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

    document.getElementById('payment_proof').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const imageHolder = document.querySelector('.image-holder');
            imageHolder.innerHTML = `<img src="${reader.result}" class="object-cover w-full h-48 rounded-lg" />`;
        };

        reader.readAsDataURL(file);
    });
</script>

@endsection