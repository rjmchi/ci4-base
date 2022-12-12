/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: ["./App/Views/**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        primary: colors.teal,
        secondary: colors.purple,
        neutral: colors.zinc,
        danger: colors.red,
        warning: colors.yellow,
        success: colors.green,
      },
    },
  },
  plugins: [require('@tailwindcss/forms')],
}
