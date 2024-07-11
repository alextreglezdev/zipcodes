/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        purpleColor: '#543C7A',
        textColor: '#666680',
        bgColor: '#FDFAFC',
        purpleLight:'#B2B3D5',
        pinkColor: '#FC3894',
        footerColor: '#444444'
      },
      fontFamily: {
        'avenir-next': ['Avenir Next', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

