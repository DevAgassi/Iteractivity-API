import fs from "fs";
import path from "path";

export function hotFilePlugin({ file = "dist/hot" } = {}) {
  let root;
  let hotPath;

  return {
    name: "wp-hot-file",

    config(config, env) {
      // Установить root в методе config (он вызывается раньше configureServer)
      root = config.root || process.cwd();
    //  console.log("🔧 Config root set:", root);
      hotPath = path.resolve(root, file);
    },

    configureServer(server) {
      // Чекаємо поки сервер повністю запустився
      setTimeout(() => {
        //console.log("📋 Hot File Debug Info:");
       // console.log("  root:", root);
       // console.log("  hotPath:", hotPath);
       // console.log("  server.resolvedUrls:", server.resolvedUrls);
        
        if (server.resolvedUrls?.local?.[0]) {
          const url = server.resolvedUrls.local[0];
          
          console.log("⚙️ Hot File Plugin - Creating hot file");
          console.log("  URL:", url);
          
          try {
            fs.mkdirSync(path.dirname(hotPath), { recursive: true });
            fs.writeFileSync(hotPath, url);
            console.log("✅ Hot file created successfully at:", hotPath);
            console.log("  Verify file exists:", fs.existsSync(hotPath));
          } catch (err) {
            console.error("❌ Failed to create hot file:", err.message);
          }
        } else {
          console.warn("⚠️ Resolved URLs not available yet");
        }
      }, 500);
    },
  };
}
