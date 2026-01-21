# WordPress Docker Environment

## Вимоги

- Docker
- Docker Compose
- Git Bash (для Windows)

## Швидкий старт

```bash
./wp.sh start
```

Сайт доступний: http://localhost

## Команди

### Docker

| Команда | Опис |
|---------|------|
| `./wp. sh start` | Запустити контейнери |
| `./wp.sh stop` | Зупинити контейнери |
| `./wp.sh restart` | Перезапустити контейнери |
| `./wp.sh rebuild` | Перебудувати контейнери (після змін в Dockerfile) |
| `./wp.sh logs` | Показати логи |
| `./wp.sh bash` | Зайти в WordPress контейнер |

### Composer

| Команда | Опис |
|---------|------|
| `./wp.sh install` | Встановити залежності (composer install) |
| `./wp.sh update` | Оновити залежності (composer update) |
| `./wp.sh require {package}` | Додати пакет |
| `./wp.sh composer {cmd}` | Будь-яка composer команда |

### Приклади Composer

```bash
# Додати плагін
./wp.sh require wpackagist-plugin/advanced-custom-fields

# Додати PHP пакет
./wp.sh require timber/timber

# Оновити один пакет
./wp.sh composer update timber/timber

# Видалити пакет
./wp.sh composer remove timber/timber
```

## Структура проекту

```
project/
├── wp. sh                 # Команди управління
├── composer.json         # PHP залежності
├── config/
│   ├── . env. local        # Локальні змінні
│   ├── .env. prod         # Продакшн змінні
│   └── wp-config.php     # WordPress конфіг
├── docker/
│   ├── docker-compose.yml
│   ├── nginx/
│   │   └── default.conf
│   └── wordpress/
│       └── Dockerfile
├── vendor/               # Composer пакети
└── wp-content/
    ├── mu-plugins/
    │   └── autoload.php  # Підключення Composer
    ├── plugins/
    └── themes/
```

## Конфігурація

### Локальна розробка

Змінні в `config/. env.local`:

```env
DB_HOST=db
DB_NAME=wordpress
DB_USER=wp_user
DB_PASSWORD=local_secret
DB_ROOT_PASSWORD=root_secret
WP_DEBUG=true
WP_ENV=local
NGINX_PORT=80
```

### Продакшн

Використовуй `config/.env. prod` для деплою. 

## Windows CMD

Для CMD використовуй `wp.bat`:

```cmd
wp.bat start
wp.bat stop
```