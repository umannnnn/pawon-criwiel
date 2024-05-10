@extends('layouts.dashboard')

@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="bg-gray-300 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h5 class="mr-3 text-lg font-semibold dark:text-white">Daftar Pesanan Pawon Criwiel</h5>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Berikut ini merupakan data pesanan yang masuk ke Pawon Criwiel</p>
                </div>
            </div>
            <div class="overflow-x-auto  min-h-96">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-10 py-3">
                                Invoice
                            </th>
                            <th scope="col" class="px-20 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->isEmpty())
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data Pesanan
                                </td>
                            </tr>
                            @else
                            @foreach ($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->invoice }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($order->status == '0')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Belum Dikonfirmasi</span>
                                    @elseif ($order->status == '1' && $order->payment_proof === null)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Dikonfirmasi</span>
                                    @endif
                                    @if ($order->payment_proof != null)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-300 border border-blue-300">Selesai</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 flex items-center justify-center">
                                    <button id="order-{{ $order->id }}-dropdown-Leftbutton" data-dropdown-toggle="order-{{ $order->id }}-dropdownLeft" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="order-{{ $order->id }}-dropdownLeft" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                                            <li>
                                                <a href="#" id="order-{{ $order->id }}-modal" data-modal-toggle="order-{{ $order->id }}-modal" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lihat deskripsi</a>
                                            </li>
                                            @if ($order->status == '0')
                                            <li>
                                                <form action="/dashboard/orders/{{ $order->id }}/confirm" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="block text-start w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Konfirmasi Pesanan</button>
                                                </form>
                                            </li>
                                            @elseif ($order->status == '1' && $order->payment_proof != null)
                                            <li>
                                                <a href="#" id="order-{{ $order->id }}-modal-payment" data-modal-toggle="order-{{ $order->id }}-modal-payment" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lihat Bukti Pembayaran</a>
                                            </li>
                                            @endif                                                                           
                                        </ul>
                                        <div class="py-1">
                                            @if ($order->status == 0 || ($order->status == 1 && $order->payment_proof === null))
                                                <form class="delete-form" action="/dashboard/orders/{{ $order->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="block text-start w-full py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">Hapus Pesanan</button>
                                                </form>
                                            @endif
                                        </div>                                                                             
                                    </div>
                                </td>
                            </tr>
                            <div id="order-{{ $order->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <!-- Modal header -->
                                        <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                            <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                <h3 class="font-semibold ">
                                                    Pesanan dari
                                                </h3>
                                                <p class="font-bold">
                                                    {{ $order->customer  }}
                                                </p>
                                            </div>
                                            <div>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="order-{{ $order->id }}-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                                            <p class="mb-2">
                                                <p class="mb-2">
                                                    Tanggal Pesan : {{ $order->created_at->format('d F Y') }}
                                                </p>
                                                <p class="mb-2">
                                                    Menu pesanan : {{ $order->product }}
                                                </p>
                                                <p class="mb-2">
                                                    Jumlah pesanan : {{ $order->quantity }}
                                                </p>
                                                <p class="mb-2">
                                                    Detail pesanan : {{ $order->desc }}
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="order-{{ $order->id }}-modal-payment" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <!-- Modal header -->
                                        <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                            <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                <h3 class="font-semibold ">
                                                    Bukti Pembayaran dari
                                                </h3>
                                                <p class="font-bold">
                                                    {{ $order->customer  }}
                                                </p>
                                            </div>
                                            <div>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="order-{{ $order->id }}-modal-payment">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                                            <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" class="w-full h-auto object-cover rounded-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                    <div class="flex mx-auto gap-3">
                    <!-- Previous Button -->
                    @if ($orders->onFirstPage())
                    <span class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                        </svg>
                        Previous
                    </span>
                    @else
                    <a href="{{ $orders->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                        </svg>
                        Previous
                    </a>
                    @endif
                    <!-- Next Button -->
                    @if ($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0l-4-4m4 4l-4 4"/>
                        </svg>
                    </a>
                    @else
                    <span class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0l-4-4m4 4l-4 4"/>
                        </svg>
                    </span>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(deleteForm => {
            deleteForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });

                swalWithBootstrapButtons.fire({
                    title: "Apakah anda yakin?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Here you can put your AJAX request or form submission if you want to handle it separately
                        deleteForm.submit(); // Submit form after confirmation
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Do nothing if the user cancels
                    }
                });
            });
        });

        // Function to handle displaying error order if any
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

    // Handle pagination click
    $('.pagination').on('click', 'a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href'); // Get the URL of the pagination link
        var table = $(this).data('table'); // Get the table number from the data-table attribute

        // Send AJAX request to the corresponding endpoint based on the table number
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                // Update the corresponding table with the new data
                if (table == 1) {
                    $('#table1').html(data);
                } else if (table == 2) {
                    $('#table2').html(data);
                } else if (table == 3) {
                    $('#table3').html(data);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

</script>



@endsection