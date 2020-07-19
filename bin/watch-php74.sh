#!/usr/bin/env bash

docker-compose run php74 -d 'ffi.enable=true' vendor/bin/phpunit-watcher watch --group php74 --testsuite php74
