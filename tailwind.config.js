/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'texture_1': "url('/assets/images/backgrounds/Texture_1.png')",
      },
      colors: {
        textWhite: '#f1f5f9',
        textYellow: '#f5ba00',
        textBlack: '#18181b',
        textGold: '#75683b',
        bgGold: '#75683b',
        bgBlack: '#1c1917',
        glitchR: '#fe3e3e',
        glitchG: '#3df0cf',
        glitchW: '#f1f1f1'
      },
      fontFamily: {
        fontTitle: ['COPRGBT']
      },
    },

  },
  plugins: [],
}
