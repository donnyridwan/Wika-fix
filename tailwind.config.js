/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'themeBlue' : '#0395FF',
      },
      backgroundImage: {
        'hero-pattern': "url('/assets/landing.jpg')",
      }
    },
  },
  plugins: [],
}

