export default defineConfig({
    build: {
        outDir: 'public/build',
        manifest: true,
        base: process.env.NODE_ENV === 'production' ? '/' : '',  // Ensure this is set to '/' in production
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
