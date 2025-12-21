import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import core from "./core/.vite";

export default defineConfig({
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
