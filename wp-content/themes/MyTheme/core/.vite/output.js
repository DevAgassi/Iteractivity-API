export const outputConfig = {
  entryFileNames(chunkInfo) {
    if (chunkInfo.name.includes("blocks/")) {
      return `${chunkInfo.name}.[hash].js`;
    }

    return `[name].[hash].js`;
  },

  chunkFileNames: `[name].[hash].js`,

  assetFileNames(assetInfo) {
    if (assetInfo.name?.startsWith("blocks/")) {
      const [, blockName] = assetInfo.name.split("/");
      if (blockName) {
        return `blocks/${blockName}/styles.[hash].css`;
      }
    }

    if (assetInfo.name?.includes("main") || assetInfo.name?.includes("swiper-global")) {
      return `assets/styles/[name].[hash][extname]`;
    }

    return `[name].[hash][extname]`;
  },
};
