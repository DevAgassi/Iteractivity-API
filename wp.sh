#!/bin/bash

# =============================================================================
# WordPress Docker Management Script
# =============================================================================
#
# Usage: ./wp.sh <command> [arguments]
#
# =============================================================================

cd "$(dirname "$0")"

DC="docker compose -f docker/docker-compose.yml --env-file config/.env.local"

case "$1" in

  # ---------------------------------------------------------------------------
  # Docker Commands
  # ---------------------------------------------------------------------------

  ##
  # Start all containers in detached mode
  #
  # Usage:
  #   ./wp.sh start
  ##
  start)
    $DC up -d
    ;;

  ##
  # Stop and remove all containers
  #
  # Usage:
  #   ./wp.sh stop
  ##
  stop)
    $DC down
    ;;

  ##
  # Restart all containers
  #
  # Usage:
  #   ./wp.sh restart
  ##
  restart)
    $DC down
    $DC up -d
    ;;

  ##
  # Rebuild containers with --build --force-recreate
  # Use after Dockerfile or docker-compose.yml changes
  #
  # Usage:
  #   ./wp.sh rebuild
  ##
  rebuild)
    $DC up -d --build --force-recreate
    ;;

  ##
  # Show and follow container logs
  #
  # Usage:
  #   ./wp.sh logs
  ##
  logs)
    $DC logs -f
    ;;

  ##
  # Enter WordPress container shell
  #
  # Usage:
  #   ./wp.sh bash
  ##
  bash)
    $DC exec wordpress bash
    ;;

  # ---------------------------------------------------------------------------
  # Composer Commands
  # ---------------------------------------------------------------------------

  ##
  # Run any composer command inside container
  #
  # Usage:
  #   ./wp.sh composer <command>
  #
  # Examples:
  #   ./wp.sh composer dump-autoload
  #   ./wp.sh composer show
  #   ./wp.sh composer outdated
  #   ./wp.sh composer remove timber/timber
  ##
  composer)
    $DC exec wordpress composer "${@:2}"
    ;;

  ##
  # Run composer install
  # Installs all dependencies from composer.lock
  #
  # Usage:
  #   ./wp.sh install
  ##
  install)
    $DC exec wordpress composer install
    ;;

  ##
  # Run composer update
  # Updates all dependencies to latest versions
  #
  # Usage:
  #   ./wp.sh update
  ##
  update)
    $DC exec wordpress composer update
    ;;

  ##
  # Add a composer package
  #
  # Usage:
  #   ./wp.sh require <package>
  #   ./wp.sh require <package> --dev
  #
  # Examples:
  #   ./wp.sh require timber/timber
  #   ./wp.sh require wpackagist-plugin/advanced-custom-fields
  #   ./wp.sh require wpackagist-plugin/contact-form-7
  #   ./wp.sh require wpackagist-theme/flavor
  #   ./wp.sh require phpunit/phpunit --dev
  ##
  require)
    $DC exec wordpress composer require "${@:2}"
    ;;

  ##
  # Clean default themes and plugins
  #
  # Usage:
  #   ./wp.sh cleanup
  ##
  cleanup)
    $DC exec -T wordpress bash -c "rm -rf /var/www/html/wp-content/themes/twentytwenty* /var/www/html/wp-content/plugins/akismet /var/www/html/wp-content/plugins/hello.php"
    echo "Cleanup complete!"
    ;;

  ## CUSTOM COMMANDS CAN BE ADDED HERE ##



  # ---------------------------------------------------------------------------
  # Help
  # ---------------------------------------------------------------------------

  *)
    echo "==========================================================================="
    echo " WordPress Docker Management Script"
    echo "==========================================================================="
    echo ""
    echo " Usage: ./wp.sh <command> [arguments]"
    echo ""
    echo "---------------------------------------------------------------------------"
    echo " Docker Commands"
    echo "---------------------------------------------------------------------------"
    echo "  start       Start all containers"
    echo "  stop        Stop all containers"
    echo "  restart     Restart all containers"
    echo "  rebuild     Rebuild and restart containers"
    echo "  logs        Show container logs"
    echo "  bash        Enter WordPress container"
    echo ""
    echo "---------------------------------------------------------------------------"
    echo " Composer Commands"
    echo "---------------------------------------------------------------------------"
    echo "  install     Run composer install"
    echo "  update      Run composer update"
    echo "  require     Add package (./wp.sh require vendor/package)"
    echo "  composer    Any command (./wp.sh composer dump-autoload)"
    echo ""
    echo "---------------------------------------------------------------------------"
    echo " Examples"
    echo "---------------------------------------------------------------------------"
    echo "  ./wp.sh start"
    echo "  ./wp.sh require timber/timber"
    echo "  ./wp.sh require wpackagist-plugin/advanced-custom-fields"
    echo "  ./wp.sh composer show"
    echo "  ./wp.sh bash"
    echo ""
    echo "==========================================================================="
    ;;
esac