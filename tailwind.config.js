/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class', // Enable dark mode via class
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      animation: {
        'spin-slow': 'spin 3s linear infinite',
      },
    },
  },
  plugins: [],
}

