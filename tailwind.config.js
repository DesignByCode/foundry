const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './theme/**/*.{php,js}',
    './assets/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.stone
      }
    },
  },
  plugins: [],
}
