const colors = require("tailwindcss/colors");

module.exports = {
  content: [
    "./theme/**/*.{php,js}",
    "./assets/**/*.js",
  ],
  important: false,
  theme: {
    extend: {
      colors: {
          primary: colors.zinc,
        secondary: colors.stone,
        gray: colors.zinc,
      },
      typography: ({ theme }) => ({
        DEFAULT: {
          css: {
            maxWidth: theme("columns.7xl"),
          },
        },
      }),
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
