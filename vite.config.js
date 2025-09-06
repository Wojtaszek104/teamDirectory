import { defineConfig } from 'vite';
import { resolve } from 'path';
export default defineConfig({
  build: {
    outDir: 'public',
    emptyOutDir: false,
    rollupOptions: {
      input: {
        'js/frontend': resolve(__dirname, 'assets/js/frontend.js'),
        'js/admin': resolve(__dirname, 'assets/js/admin.js')
      },
      output: {
        entryFileNames: (c) => `${c.name}.js`,
        assetFileNames: (c) => `${c.name}.[ext]`
      }
    }
  }
});
