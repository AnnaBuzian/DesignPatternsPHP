#!/bin/bash

cd /opt/php

echo "Running tests..."
if ./vendor/bin/phpunit; then
  echo "Tests passed successfully!"
  exit 0
else
  echo "Tests failed :("
  exit 1
fi
