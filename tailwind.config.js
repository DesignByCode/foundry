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
        primary: colors.cyan,
        secondary: colors.sky,
        gray: colors.slate,
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
