export default defineConfig({
    plugins: [
      laravel({
        input: [
          'resources/css/app.css',
          'resources/js/app.js',
        ],
        refresh: true,
      }),
    ],
    build: {
      outDir: 'public/build',
    },
    // Remove base: '/myapp/' for root deployment
  });
  