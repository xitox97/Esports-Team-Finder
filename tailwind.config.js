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

        maxHeight: {
            '0': '0',
            '1/4': '20rem',
            '2/4': '35rem',
            '1/2': '50%',
            '3/4': '75%',
            'full': '100%',
        },

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
