const colors = require("tailwindcss/colors");

module.exports = {
  content: ["./theme/**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        primary: colors.violet,
        secondary: colors.zinc,
        gray: colors.stone,
      },
      typography: ({ theme }) => ({
        DEFAULT: {
          css: {
            maxWidth: theme("screens.lg"),
          },
        },
      }),
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
