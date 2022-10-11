/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      zIndex: {
        '200': '200',
      }
    }
  },
  plugins: [],
}
