import tailwindcss from 'tailwindcss';
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./*.html", "./ecommerce/*.html", "./assets/**/*.js"
  ],
  theme: {
    extend: {},
    fontFamily: {
      abc : ["Merienda", "cursive"],
      sans : ["Open Sans", "sans-serif"],
      playfair : ["Playfair Display", "serif"],
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

