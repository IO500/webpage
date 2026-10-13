#!/usr/bin/env bash
# Throwaway MySQL 8.0 for the test suite, so tests never write to a shared database.
#
#   bin/test-db.sh up      start the container (port 33306) and wait until it accepts connections
#   bin/test-db.sh down    stop and remove it (all test data goes with it)
#
# tests/bootstrap.php only accepts a local database named io500_test_local (see the guard there)
# and loads tests/schema.sql on every run. Run the suite with:
#   DATABASE_TEST_URL=mysql://io500:io500@127.0.0.1:33306/io500_test_local composer test
set -euo pipefail

NAME=io500-test-db
PORT=${TEST_DB_PORT:-33306}

case "${1:-up}" in
  up)
    if [ -z "$(docker ps -q -f name="^${NAME}$")" ]; then
      docker rm -f "$NAME" >/dev/null 2>&1 || true
      docker run -d --name "$NAME" -p "127.0.0.1:${PORT}:3306" \
        -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=io500_test_local \
        -e MYSQL_USER=io500 -e MYSQL_PASSWORD=io500 \
        mysql:8.0 >/dev/null
    fi
    for _ in $(seq 1 60); do
      if docker exec "$NAME" mysql -uio500 -pio500 -e 'SELECT 1' io500_test_local >/dev/null 2>&1; then
        echo "test database ready on 127.0.0.1:${PORT}"
        exit 0
      fi
      sleep 2
    done
    echo "test database did not become ready" >&2
    exit 1
    ;;
  down)
    docker rm -f "$NAME" >/dev/null && echo "test database removed"
    ;;
  *)
    echo "usage: $0 up|down" >&2
    exit 2
    ;;
esac
