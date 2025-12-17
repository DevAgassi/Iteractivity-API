import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import core from "./core/.vite";

export default defineConfig({
  server: {
    port: 3030,
    host: "0.0.0.0",

    hmr: {
      host: "localhost",
      port: 3030,
    },

    watch: {
      usePolling: true,
      interval: 100,
      ignored: ["node_modules/**"],
    },

    proxy: {
      "/": {
        target: process.env.WP_HOST || "http://localhost:80",
        changeOrigin: true,
        secure: false,
        bypass: (req) => {
          // Якщо запит на Vite client або на main.js/css, не проксируй
          if (
            req.url?.startsWith("/@vite/") ||
            req.url?.startsWith('/@id/') ||
            req.url?.startsWith("/node_modules/") ||
            req.url?.startsWith("/assets/styles/tailwindcss/") ||
            req.url?.startsWith("/assets/")
          ) {
            return req.url; // повертаємо шлях без проксі → обробляє Vite
          }
          // Для всього іншого проксі на WordPress
          return null;
        },
      },
    },
  },

  plugins: [
    tailwindcss(),
    core({
      external: [], // optional overrides
    }),
  ],

  build: {
    outDir: "dist",
    manifest: true,
    target: "esnext",
    minify: "esbuild",
    emptyOutDir: true,
  },
});
