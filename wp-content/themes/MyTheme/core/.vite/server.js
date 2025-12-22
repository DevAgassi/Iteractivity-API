export function getServerConfig(overrides = {}) {
  const port = parseInt(process.env.VITE_PORT || "3030");
  const host = process.env.VITE_HOST || "0.0.0.0";
  const wpHost = process.env.WP_HOST || "http://localhost:80";
  console.log("🌐 Vite Dev Server Config:", wpHost);
  const defaultConfig = {
    port,
    host,

    hmr: {
      host: "localhost",
      port,
    },

    watch: {
      usePolling: true,
      interval: 100,
      ignored: ["node_modules/**"],
      // Також стежимо за змінами у fonts и media для миттєвого копіювання
      include: ["src/**"],
    },

    proxy: {
      "/": {
        target: wpHost,
        changeOrigin: true,
        secure: false,
        bypass: (req) => {
          // Якщо запит на Vite client або на main.js/css, не проксируй
          if (
            req.url?.startsWith("/@vite/client") ||
            req.url?.startsWith("/@id/") ||
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
  };

  return { ...defaultConfig, ...overrides };
}
