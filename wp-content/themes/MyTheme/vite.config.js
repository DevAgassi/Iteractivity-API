import { defineConfig } from "vite";
import { wordpressPlugin } from "@roots/vite-plugin";
import fg from "fast-glob";
import externalGlobals from "rollup-plugin-external-globals";

/* -------------------------------------------------------------------------- */
/* Block Entries */
/* -------------------------------------------------------------------------- */
/**
 * Скануємо JS та SCSS файли у папці "blocks" і реєструємо кожен блок
 * як окрему точку входу (entry).
 */
const blockEntries = {};

// JS block files
fg.sync("blocks/*/index.js", { nodir: true }).forEach((file) => {
  blockEntries[file] = file;
});

// SCSS block files
fg.sync("blocks/*/index.scss", { nodir: true }).forEach((file) => {
  blockEntries[file] = file;
});

/* -------------------------------------------------------------------------- */
/* Vite Configuration */
/* -------------------------------------------------------------------------- */

export default defineConfig({
  /* ------------------------------------------------------------------------ */
  /* Development Server */
  /* ------------------------------------------------------------------------ */
  server: {
    port: 5173,
    strictPort: true,
    host: true,
    proxy: {
      "/": {
        target: "http://localhost:80",
        changeOrigin: true,
        secure: false,
      },
    },
    cors: false,
  },

  /* ------------------------------------------------------------------------ */
  /* Plugins */
  /* ------------------------------------------------------------------------ */
  plugins: [
    //wordpressPlugin(),
    // externalGlobals({
    //   "@wordpress/interactivity": "wp.interactivity",
    // }),
  ],

  /* ------------------------------------------------------------------------ */
  /* Module Resolution */
  /* ------------------------------------------------------------------------ */
  resolve: {
    alias: {},
  },

  /* ------------------------------------------------------------------------ */
  /* Production Build */
  /* ------------------------------------------------------------------------ */
  build: {
    outDir: "dist",
    target: "esnext",
    manifest: true,

    rollupOptions: {
      input: blockEntries,
      external: ["@wordpress/interactivity"],
      output: {
        entryFileNames: `[name].[hash].js`,
        chunkFileNames: `[name].[hash].js`,
        assetFileNames: `[name].[hash][extname]`,
      },
    },
  },
});
