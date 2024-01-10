/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        white: "white",
        black: "black",
        modalBg: "rgba(0,0,0,0.7)",
      }
    },
  },
  plugins: [],
}
