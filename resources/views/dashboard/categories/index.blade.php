@extends('layouts.dashboard')

@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="bg-gray-300 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <h5 class="mr-3 text-lg font-semibold dark:text-white">Daftar Kategori Menu Pawon Criwiel</h5>
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Daftar kategori menu makanan yang tersedia di Pawon Criwiel</p>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button type="button" data-modal-target="create-modal" data-modal-toggle="create-modal" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Kategori
                    </button>
                    <!-- Main modal -->
                    <div id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Kategori Baru
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="/dashboard/categories" class="p-5 md:p-5" method="post">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama kategori</label>
                                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                        <input type="text" id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" readonly />
                                    </div>
                                    <p id="helper-text-explanation" class="mt-2 mb-2 text-sm text-gray-500 dark:text-gray-400">*Pastikan nama dan slug kategori sudah benar.</p>
                                    <button type="submit" id="createCategory" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto  min-h-96">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Slug Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isEmpty())
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Tidak ada Kategori
                            </td>
                        </tr>
                        @else
                            @foreach ($categories as $category)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $category->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-center">
                                    <button id="category-{{ $category->id }}-dropdown-Leftbutton" data-dropdown-toggle="category-{{ $category->id }}-dropdownLeft" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="category-{{ $category->id }}-dropdownLeft" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLeftButton">
                                            <li>
                                                <a href="#" id="category-{{ $category->id }}-modal" data-modal-toggle="category-{{ $category->id }}-modal" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>                                                                                    
                                        </ul>
                                        <div class="py-1">
                                            <form class="delete-form" action="/dashboard/categories/{{ $category->slug }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="block text-start w-full py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">Delete</button>
                                            </form>                                                                                        
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div id="category-{{ $category->id }}-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                                <h3 class="font-semibold ">
                                                    Update Kategori
                                                </h3>
                                            </div>
                                            <div>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="category-{{ $category->id }}-modal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="mb-5">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama kategori</label>
                                                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" value="{{ old('name', $category->name ) }}" />
                                            </div>
                                            <div class="mb-5">
                                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                                <input type="text" id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500" readonly value="{{ old('slug', $category->slug ) }}" />
                                            </div>
                                            <p id="helper-text-explanation" class="mt-2 mb-2 text-sm text-gray-500 dark:text-gray-400">*Pastikan nama dan slug kategori sudah benar.</p>
                                            <button type="submit" id="sendCategories" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
                                        </form>
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
                    @if ($categories->onFirstPage())
                    <span class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                        </svg>
                        Previous
                    </span>
                    @else
                    <a href="{{ $categories->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                        </svg>
                        Previous
                    </a>
                    @endif
                    <!-- Next Button -->
                    @if ($categories->hasMorePages())
                    <a href="{{ $categories->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
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
    document.addEventListener('DOMContentLoaded', function() {
        const createModalName = document.querySelector('#create-modal #name');
        const createModalSlug = document.querySelector('#create-modal #slug');

        // Function to update slug based on name input
        function updateSlug(nameInput, slugInput) {
            fetch('/dashboard/categories/checkSlug?name=' + nameInput.value)
                .then(response => response.json())
                .then(data => slugInput.value = data.slug);
        }

        // Add event listeners for name input in both modals
        createModalName.addEventListener('input', function() {
            updateSlug(createModalName, createModalSlug);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Mengakses semua modals dengan class 'h-modal'
        const modals = document.querySelectorAll('.h-modal');

        // Loop melalui setiap modal
        modals.forEach(modal => {
            const nameInput = modal.querySelector('#name'); // Mengakses input nama di dalam modal
            const slugInput = modal.querySelector('#slug'); // Mengakses input slug di dalam modal

            // Function untuk memperbarui slug berdasarkan input nama
            function updateSlug(nameInput, slugInput) {
                fetch('/dashboard/categories/checkSlug?name=' + encodeURIComponent(nameInput.value)) // Menggunakan encodeURIComponent untuk menghindari masalah dengan karakter URL
                    .then(response => response.json())
                    .then(data => slugInput.value = data.slug)
                    .catch(error => console.error('Terjadi kesalahan:', error)); // Menangani kesalahan dengan mencetaknya ke konsol
            }

            // Menambahkan event listener untuk input nama di dalam modal
            nameInput.addEventListener('input', function() {
                updateSlug(nameInput, slugInput);
            });
        });
    });

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

        // Function to handle displaying error message if any
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

        // Call the function to display error message or success message
        displayMessage();
    });

    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('createCategory').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan pengiriman form default

            // Validasi form disini sesuai kebutuhan Anda
            var name = document.getElementById('name').value; // Menggunakan 'name' sebagai variabel untuk mengambil nilai input 'name'
            var slug = document.getElementById('slug').value;
            var error = false;

            // Contoh validasi sederhana, ubah sesuai kebutuhan
            if (name === '') {
                error = true;
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Pastikan semua kolom terisi dengan benar!",
                });
            }

            if (slug === '') {
                error = true;
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Pastikan semua kolom terisi dengan benar!",
                });
            }

            if (!error) {
                // Submit form secara manual jika tidak ada error
                this.closest('form').submit(); // Menggunakan closest('form') untuk menemukan form terdekat dan submit
            }
        });
    });

</script>

@endsection