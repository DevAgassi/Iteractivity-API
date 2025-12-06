#!/bin/bash
cd "$(dirname "$0")"

case "$1" in
  start)
    docker compose -f docker/docker-compose.yml --env-file config/.env.local up -d
    ;;
  stop)
    docker compose -f docker/docker-compose.yml down
    ;;
  restart)
    docker compose -f docker/docker-compose.yml down
    docker compose -f docker/docker-compose.yml --env-file config/. env.local up -d
    ;;
  rebuild)
    docker compose -f docker/docker-compose.yml --env-file config/.env. local up -d --build --force-recreate
    ;;
  logs)
    docker compose -f docker/docker-compose.yml logs -f
    ;;
  bash)
    docker compose -f docker/docker-compose. yml exec wordpress bash
    ;;
  *)
    echo "Usage: ./wp. sh {start|stop|restart|rebuild|logs|bash}"
    ;;
esac