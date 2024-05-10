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
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
  
}

