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
            bgcolor:'#f4f4f4',
            sred:'#E30613'
        },
    },
  },
  plugins: [],
}
