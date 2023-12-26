const config = require("./config");
const settings = config.settings;
const public = settings.public;


module.exports = {
  mode: "jit",
  purge: ['./public' + public + '**/*.php'],
  darkMode: false,
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}