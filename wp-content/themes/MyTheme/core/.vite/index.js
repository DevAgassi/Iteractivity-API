import { getEntries } from "./entries.js";
import { outputConfig } from "./output.js";
import { watchConfig } from "./watch.js";
import { getServerConfig } from "./server.js";
import { staticCopyPlugin } from "./staticCopy.js";
import { twigScanPlugin } from "./twigScan.js";
import { hotFilePlugin } from "./hotFile.js";

export default function coreVite(options = {}) {
  const hotPlugin = hotFilePlugin();

  return {
    name: "core-wp-vite",

    config(config, env) {
      // Викликаємо config у hotPlugin щоб встановити root
      if (hotPlugin.config) {
        hotPlugin.config(config, env);
      }

      const entries = getEntries();
      const hasEntries = Object.keys(entries).length > 0;

      return {
        server: getServerConfig(options.server || {}),

        build: {
          rollupOptions: {
            input: hasEntries
              ? entries
              : { main: new URL("index.html", import.meta.url).pathname },

            external: ["@wordpress/interactivity", ...(options.external || [])],

            output: outputConfig,
          },
        },
      };
    },

    configResolved(config) {
      if (hotPlugin.configResolved) {
        hotPlugin.configResolved(config);
      }
    },

    configureServer(server) {
      if (hotPlugin.configureServer) {
        hotPlugin.configureServer(server);
      }
    },

    ...twigScanPlugin(),
    ...staticCopyPlugin(),
  };
}
