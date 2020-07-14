#!/usr/bin/env bash

docker-compose run php74 vendor/bin/phpunit-watcher watch --group php74 --testsuite php74
