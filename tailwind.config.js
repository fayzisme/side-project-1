/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.blade.php",
   "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      // darkMode: 'media',
      colors: {
        primary: "#0C4B6E"
      },
      fontFamily: {
      'poppins': ['Poppins',  'sans-serif'],
      'roboto': ['Roboto'],
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

