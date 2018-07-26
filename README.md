# Design Patterns PHP

### Using Docker

```
docker-compose up
```

### Install dependencies

```bash
$ composer install
```

Read more about how to install and use `Composer` on your local machine [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

### Running test suite

```bash
$ ./vendor/bin/phpunit
$ docker-compose run --rm php php ./vendor/bin/phpunit Behavioral/TemplateMethod/Tests/
```