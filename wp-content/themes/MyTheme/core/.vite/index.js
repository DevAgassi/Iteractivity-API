import { getEntries } from "./entries.js";
import { outputConfig } from "./output.js";
import { watchConfig } from "./watch.js";
import { getServerConfig } from "./server.js";
import { staticCopyPlugin } from "./staticCopy.js";
import { twigScanPlugin } from "./twigScan.js";

export default function coreVite(options = {}) {
  return {
    name: "core-wp-vite",

    config(_, { command }) {
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
    ...twigScanPlugin(),
    ...staticCopyPlugin(),
  };
}
