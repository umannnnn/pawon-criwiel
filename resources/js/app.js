import 'flowbite';

window.addEventListener("scroll", function() {
    var header = document.querySelector("nav");
    header.classList.toggle("bg-black", window.scrollY > 0); // Ubah ini ke bg-black
    header.style.transition = "background-color 0.3s ease-in-out"; // Add transition
});

