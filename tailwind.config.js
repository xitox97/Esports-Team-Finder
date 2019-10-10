module.exports = {
    important: true,
    theme: {
        pagination: theme => ({
            color: theme('colors.purple.600'),
            linkFirst: 'mr-6 border rounded',
            linkSecond: 'rounded-l border-l',
            linkBeforeLast: 'rounded-r border-r',
            linkLast: 'ml-6 border rounded',
        }),

        extend: {
            margin: {
                '96': '20rem',
            },
        }
    },
    variants: {},
    plugins: [
        require('tailwindcss-plugins/pagination'),
    ],
}
