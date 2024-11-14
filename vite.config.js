export default defineConfig({
    build: {
        outDir: 'public/build',
        manifest: true,
        
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
