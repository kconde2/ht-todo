# Simple todo app for heyteam technical test

The goal is to create a simple todo list project in PHP and more precisely using the
laravel framework. You will need to communicate with AWS API to handle this todo list.

## 2 Requirements to run the project

1. Make sure to have at least docker version `>= 20.10.21` with compose plugin

```
docker --version
docker compose --version
```

2. Have `make` command installed

```
make --version
```

## Run project

- (**Recommanded for the first time run**) Build docker images and run init setup

```
make build-up
```

- Stop all containers

```
make down
```

- Start all containers

```
make up
```

You can run `make` command to see other available commands.

Todo app url [http://localhost:8083](http://localhost:8083)

## Tests

```
make tests
```

## Useful command

- `make command COMMAND="php artisan make:controller TodoAddController --invokable"`
- `make command COMMAND="php artisan make:request TodoPostRequest"`
- `make command COMMAND="php artisan cache:clear"`
- `make command COMMAND="php artisan test --coverage"`

## References

- https://github.com/sherifabdlnaby/kubephp
- https://laravel.com/docs/9.x/http-client
