import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import laravel from "laravel-vite-plugin";
import { glob } from "glob";

// Динамічно знаходимо всі block.js файли
const blockFiles = glob.sync("blocks/*/block.js", { cwd: __dirname });

const autoHmrPlugin = () => {
  return {
    name: "auto-hmr",
    apply: "serve", // Працює тільки під час npm run dev
    transform(code: string, id: string) {
      // Перевіряємо, чи файл знаходиться в потрібних папках
      if (
        id.includes("blocks/") ||
        id.includes("templates/") ||
        id.includes("resources/")
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

export default defineConfig(({ command }) => {
  const isBuild = command === "build";
  console.log(
    `Vite is running in ${isBuild ? "production" : "development"} mode.`,
  );
  return {
    resolve: {
      alias: {
        // Це перенаправляє імпорт на зовнішній браузерний модуль
        //"@wordpress/interactivity": "@wordpress/interactivity",
      },
    },
    plugins: [
      autoHmrPlugin(),
      tailwindcss(),
      laravel({
        input: [
          "resources/scripts/app.js",
          "resources/scripts/admin.js",
          ...blockFiles,
          "resources/css/admin.css",
        ],
        refresh: [
          "blocks/**/*.{twig,php}",
          "templates/**/*.{twig,php}",
          "views/**/*.{twig,php}",
          "ui/**/*.{twig,php}",
        ],
        publicDirectory: "dist",
        buildDirectory: ".",
      }),
    ],
    build: {
      minify: "terser",
      terserOptions: {
        compress: {
          //  drop_console: true,
          drop_debugger: true,
        },
      },
      rollupOptions: {
        external: [/^@wordpress\/.*/],
        output: {
          manualChunks(id) {
            if (id.includes("node_modules/gsap")) {
              return "gsap"; // окремий chunk gsap.js
            }
            if (id.includes("node_modules/swiper")) {
              return "swiper"; // окремий chunk swiper.js
            }
          },
        },
      },
    },
    optimizeDeps: {
      // include: ["swiper", "swiper/modules"],
      exclude: ["gsap", "@wordpress/interactivity"],
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
  };
});
