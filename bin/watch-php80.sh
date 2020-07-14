#!/usr/bin/env bash

docker-compose run php80 vendor/bin/phpunit-watcher watch --group php80  --testsuite php80
