#!/bin/bash

# Watch режим для розробки - слухає Docker порт та синхронізує стилі в реал-тайм

set -e

# Кольори для виводу
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}🚀 Запуск Vite в режимі watch з Docker синхронізацією...${NC}"

# Переходимо в папку теми
cd "$(dirname "$0")/wp-content/themes/MyTheme"

# Встановлюємо змінні оточення для Docker
export WP_HOST="http://nginx:80"
export NODE_ENV="development"

echo -e "${GREEN}✓ Vite dev server запущений на порту 5173${NC}"
echo -e "${GREEN}✓ HMR (Hot Module Replacement) активний${NC}"
echo -e "${GREEN}✓ Файли будуть автоматично перезавантажуватись${NC}"
echo ""
echo -e "${BLUE}Доступні адреси:${NC}"
echo -e "  • Локально: ${GREEN}http://localhost:5173${NC}"
echo -e "  • Docker: ${GREEN}http://nginx:5173${NC}"
echo ""
echo -e "${BLUE}Слуховуємо зміни файлів у:${NC}"
echo -e "  • blocks/**/*.{js,scss}"
echo -e "  • assets/**/*"
echo ""

# Запускаємо Vite в режимі watch
npm run dev:watch
