@extends('layouts.dashboard')

@section('container')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="mx-auto max-w-screen-xl">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg min-h-96">
                <div class="w-full max-w-screen-xl mx-auto">
                    <!-- Start coding here -->
                    <div class="relative overflow-hidden bg-gray-300 dark:bg-gray-800 sm:rounded-t-lg">
                        <div class="flex-row items-center justify-between p-5 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                        <div>
                            <h5 class="mr-3 text-lg font-semibold dark:text-white">Gallery Pawon Criwiel</h5>
                            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Daftar gambar yang tersedia di Pawon Criwiel</p>
                        </div>
                        <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2 -ml-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>  
                            Tambah gambar baru
                        </button>
                        </div>
                    </div>
                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Gambar Baru
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="/dashboard/galleries" class="p-5 md:p-5" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex justify-center w-full">
                                        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">JPEG,PNG,JPG | MAX: 5MB </p>
                                            </div>
                                            <input id="image" name="image" type="file" class="hidden"/>
                                        </label>
                                    </div>
                                    <div class="image-holder flex items-center justify-center w-full bg-gray-50 dark:bg-gray-700 rounded-lg mt-5"></div>
                                    <button type="submit" id="sendImages" class="text-white inline-flex items-center mt-4 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Tambah Gambar Baru
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 p-5">
                        @if ($galleries->isEmpty())
                            <div class="flex items *:center justify-center col-span-4 p-5 rounded-lg">
                                <p class="text-lg font-semibold text-gray-500 dark:text-gray-400">Tidak ada gambar.</p>
                            </div>
                            @else
                            @foreach ($galleries as $gallery)
                                <div class="gallery-container relative overflow-hidden bg-gray-300 shadow-md rounded-lg dark:bg-gray-800">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="object-cover w-full h-48" alt="Gallery Image">
                                    <div class="overlay"></div> <!-- overlay for transparent black background -->
                                    <form action="/dashboard/galleries/{{ $gallery->id }}" method="post" class="delete-form">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        @endif
                    </div>                                               
                </div>
                <footer class="bg-white rounded-b-lg shadow dark:bg-gray-800">
                    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                        <div class="flex mx-auto gap-3">
                        <!-- Previous Button -->
                        @if ($galleries->onFirstPage())
                        <span class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                            </svg>
                            Previous
                        </span>
                        @else
                        <a href="{{ $galleries->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
                            <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0l4-4m-4 4l4 4"/>
                            </svg>
                            Previous
                        </a>
                        @endif
                        <!-- Next Button -->
                        @if ($galleries->hasMorePages())
                        <a href="{{ $galleries->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" data-table="1">
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
                </footer>
            </div>
        </div>
    </div>
</div>

<!-- Pastikan Sweet Alert script di atas skrip JavaScript ini -->
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

    document.getElementById('image').addEventListener('change', function() {
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

    // Function to handle image preview
    const imageInput = document.getElementById('image');
    const imageHolder = document.querySelector('.image-holder');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function () {
            const image = new Image();
            image.src = reader.result;
            image.classList.add('object-cover', 'w-full', 'h-48', 'rounded-lg');
            imageHolder.innerHTML = '';
            imageHolder.appendChild(image);
        };

        reader.readAsDataURL(file);
    });

</script>

@endsection