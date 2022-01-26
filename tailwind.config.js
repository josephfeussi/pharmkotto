const colors = require("tailwindcss/colors");
const withAnimations = require("animated-tailwindcss");

module.exports = withAnimations({
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            /*  colors: { primary:{...colors.pink, 900: colors.pink[600] },
            secondary: colors.orange,...colors}, */
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require("daisyui")],

    // config (optional)
    daisyui: {
        styled: true,
        themes: [
            {
                mytheme: {
                    primary: colors.pink[600],
                    "primary-focus": "#f000b8",
                    "primary-content": colors.white,
                    secondary: colors.orange[500],
                    "secondary-focus": "#4e9a06",
                    "secondary-content": "#ffffff",
                    accent: "#37cdbe",
                    "accent-focus": "#2aa79b",
                    "accent-content": "#ffffff",
                    neutral: "#3d4451",
                    "neutral-focus": "#2a2e37",
                    "neutral-content": "#ffffff",
                    "base-100": "#ffffff",
                    "base-200": "#f9fafb",
                    "base-300": "#d1d5db",
                    "base-content": "#1f2937",
                    info: "#2094f3",
                    success: "#009485",
                    warning: "#ff9900",
                    error: "#ff5724",
                },
            },
        ],
        base: false,
        utils: true,
        logs: true,
        rtl: false,
    },
});
