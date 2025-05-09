/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./**/*.php",
        "./src/**/*.php",
        "./templates/**/*.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                fredoka: ['Fredoka', 'sans-serif'],
                poppins: ['Poppins', 'sans-serif'],
            },
        },
    },
    plugins: [],
}