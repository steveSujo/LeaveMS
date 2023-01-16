/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"

    ],
    theme: {
        extend: {},
    },
    // prefix: "tw-",
    corePlugins: {
        // preflight: false,
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],
}
