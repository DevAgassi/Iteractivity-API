import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import laravel from "laravel-vite-plugin";

const autoHmrPlugin = () => {
  return {
    name: "auto-hmr",
    apply: "serve", // Працює тільки під час npm run dev
    transform(code: string, id: string) {
      // Перевіряємо, чи файл знаходиться в потрібних папках
      if (
        id.includes("blocks/") ||
        id.includes("templates/") ||
        id.includes("assets/")
      ) {
        // Перевіряємо, чи файл вже має hot.accept, щоб не дублювати
        if (!code.includes("import.meta.hot.accept")) {
          return {
            code: `${code}\n\nif (import.meta.hot) { import.meta.hot.accept(() => { console.log('HMR updated: ${id}'); }); }`,
            map: null, // sourcemap можна ігнорувати для простої ін'єкції
          };
        }
      }
      return null;
    },
  };
};

export default defineConfig({
  resolve: {
    alias: {
      // Це перенаправляє імпорт на зовнішній браузерний модуль
      "@wordpress/interactivity": "@wordpress/interactivity",
    },
  },
  css: {
    devSourcemap: true,
  },
  plugins: [
    {
      name: "ignore-wp-imports",
      enforce: "pre",
      resolveId(id) {
        if (id === "@wordpress/interactivity") {
          return id;
        }
      },
    },
    autoHmrPlugin(),
    tailwindcss(),
    laravel({
      input: [
        "assets/scripts/app.js",
        "assets/scripts/admin.js",
        "blocks/Hero/block.js",
        "assets/scripts/swiper.js",
      ],
      refresh: [
        "blocks/**/*.{twig,php}",
        "templates/**/*.{twig,php}",
        "views/**/*.{twig,php}",
      ],
      publicDirectory: "dist",
      buildDirectory: ".",
    }),
  ],
  build: {
    rollupOptions: {
      external: ["@wordpress/interactivity", "swiper"],
      output: {
        globals: {
          "@wordpress/interactivity": "wp.interactivity",
          swiper: "Swiper",
        },
      },
    },
  },
  optimizeDeps: {
    exclude: ["@wordpress/interactivity", "swiper"],
  },
  server: {
    host: "0.0.0.0",
    port: 3000,
    strictPort: true,
    origin: "http://localhost:3000",
    hmr: {
      host: "localhost", // Браузер на хості стукає сюди для оновлень
    },
    cors: true,
    watch: {
      usePolling: true, // Критично для Docker (особливо Windows/macOS)
    },
  },
});
