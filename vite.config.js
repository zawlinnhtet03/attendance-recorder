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
    base: '/myapp/',  // Set base path if app is in a subdirectory
  });
  