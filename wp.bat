@echo off
cd /d "%~dp0"

if "%1"=="" goto help
if "%1"=="start" goto start
if "%1"=="stop" goto stop
if "%1"=="restart" goto restart
if "%1"=="rebuild" goto rebuild
if "%1"=="logs" goto logs
if "%1"=="bash" goto bash
goto help

:start
docker-compose -f docker/docker-compose. yml --env-file config/.env.local up -d
goto end

:stop
docker-compose -f docker/docker-compose.yml down
goto end

:restart
docker-compose -f docker/docker-compose.yml down
docker-compose -f docker/docker-compose.yml --env-file config/.env.local up -d
goto end

:rebuild
docker-compose -f docker/docker-compose.yml --env-file config/. env.local up -d --build --force-recreate
goto end

:logs
docker-compose -f docker/docker-compose.yml logs -f
goto end

:bash
docker-compose -f docker/docker-compose.yml exec wordpress bash
goto end

:help
echo Usage: wp.bat [command]
echo. 
echo Commands:
echo   start    - Start containers
echo   stop     - Stop containers
echo   restart  - Restart containers
echo   rebuild  - Rebuild and restart
echo   logs     - Show logs
echo   bash     - Enter WordPress container
goto end

:end