/** @type {import('tailwindcss').Config} config */

import typography from '@tailwindcss/typography';

const config = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './safelist.txt',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '2.5rem',
        '2xl': '3rem',
      },
    },
    colors: {
      transparent: 'transparent',
      white: '#ffffff',
      black: '#000000',
      gray: '#232323',
      blue: '#48D2F7',
    },
    fontFamily: {
      sans: [
        'Nunito Sans',
        'Avenir',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
      heading: ['Grilled Cheese', 'sans-serif'],
    },
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            '--tw-prose-body': theme('colors.black'),
            '--tw-prose-headings': theme('colors.black'),
            '--tw-prose-bold': theme('colors.blue'),
            '--tw-prose-links': theme('colors.blue'),
          },
        },
      }),
    },
  },
  plugins: [typography],
};

export default config;
