export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        "black": "#060606"
      },
      fontFamily: {
        "hanken-grotesk": ["Hanken Grotesk", "sans-serif"]
      },
      width: {
        42: '42px',
        100: '100px',
      },
      fontSize: {
        "2xs": ".625rem"
      }
    },
  },
  plugins: [],
}