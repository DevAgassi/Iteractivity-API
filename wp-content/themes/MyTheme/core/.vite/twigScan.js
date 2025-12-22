// core/.vite/tailwindTwigPlugin.js
import fg from "fast-glob";
import path from "path";

export function twigScanPlugin() {
  // Скани файли проекту
  const twigFiles = fg.sync(
    [
      "views/**/*.twig",
      "blocks/**/*.twig",
      "templates/**/*.twig",
      "ui/**/*.twig",
    ],
    { nodir: true }
  );

  const styleFiles = fg.sync(
    [
      "assets/**/*.css",
      "assets/**/*.scss",
      "blocks/**/*.js",
      "templates/**/*.js",
    ],
    { nodir: true }
  );

  return {
    name: "core-wp-vite-twig-scan",

    buildStart() {
      //console.log("Twig files:", twigFiles);
      //console.log("JS/CSS/SCSS files:", styleFiles);

      // Додаємо всі Twig і стилі до watch
      [...twigFiles, ...styleFiles].forEach((file) => {
        this.addWatchFile(file);
      });
    },

    // HMR: Twig → full reload, інші файли → звичайний HMR
    handleHotUpdate({ file, server }) {
      const relativePath = path
        .relative(process.cwd(), file)
        .replace(/\\/g, "/");
      if (twigFiles.includes(relativePath)) {

        server.ws.send({ type: "full-reload", path: "*" });
        return [];
      }
    },
    // Додаємо коментарі у JS/CSS, щоб Tailwind бачив класи з Twig
    transform(code, id) {
      if (id.endsWith(".js") || id.endsWith(".css") || id.endsWith(".scss")) {
        return {
          code:
            code +
            "\n" +
            twigFiles.map((f) => `/* @tailwind-scan ${f} */`).join("\n"),
          map: null,
        };
      }
    },
  };
}
