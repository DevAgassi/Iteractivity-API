import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));

export function staticCopyPlugin() {
  let config;

  const copyStaticFiles = () => {
    // Отримуємо root проекту (папка де лежить vite.config.ts)
    const projectRoot = config.root || process.cwd();
    const srcDir = path.join(projectRoot, "assets");
    const outDir = config.build.outDir || "dist";
    const distDir = path.isAbsolute(outDir)
      ? outDir
      : path.join(projectRoot, outDir);

    // Папки для копіювання
    const foldersToCopy = ["fonts", "media"];

    for (const folder of foldersToCopy) {
      const srcPath = path.join(srcDir, folder);
      const destPath = path.join(distDir, "assets", folder);

      // Перевіряємо чи існує папка в src
      if (fs.existsSync(srcPath)) {
        // Створюємо destination папку якщо не існує
        fs.mkdirSync(destPath, { recursive: true });

        // Копіюємо файли
        copyDirSync(srcPath, destPath);
        console.log(`✓ Скопійовано ${folder} в dist/assets/`);
      }
    }
  };

  return {
    name: "static-copy",
    configResolved(resolvedConfig) {
      config = resolvedConfig;
    },
    // Копіюємо при dev старті
    transformIndexHtml() {
      if (config.command === "serve") {
        copyStaticFiles();
      }
    },
    // Копіюємо після build
    async writeBundle() {
      copyStaticFiles();
    },
  };
}

function copyDirSync(src, dest) {
  // Створюємо destination папку
  fs.mkdirSync(dest, { recursive: true });

  // Читаємо файли в src
  const files = fs.readdirSync(src);

  for (const file of files) {
    const srcFile = path.join(src, file);
    const destFile = path.join(dest, file);
    const stat = fs.statSync(srcFile);

    if (stat.isDirectory()) {
      // Рекурсивно копіюємо папки
      copyDirSync(srcFile, destFile);
    } else {
      // Копіюємо файли
      fs.copyFileSync(srcFile, destFile);
    }
  }
}
