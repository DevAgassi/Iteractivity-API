import fg from "fast-glob";

export function getEntries() {
  const entries = {
    "assets/styles/main": "assets/styles/main.css",
    "assets/scripts/main": "assets/scripts/main.js",
    "assets/scripts/swiper-global": "assets/scripts/swiper-global.js",
    "assets/styles/swiper-global": "assets/styles/swiper-global.css",
  };

  fg.sync("blocks/*/index.js", { nodir: true }).forEach(
    (file) => (entries[file] = file)
  );

  fg.sync("templates/*/index.js", { nodir: true }).forEach(
    (file) => (entries[file] = file)
  );

  fg.sync("blocks/*/index.scss", { nodir: true }).forEach(
    (file) => (entries[file] = file)
  );

  fg.sync("templates/*/index.scss", { nodir: true }).forEach(
    (file) => (entries[file] = file)
  );

  return entries;
}
