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

- make command COMMAND="php artisan make:controller TodoAddController --invokable"
- make command COMMAND="php artisan make:request TodoPostRequest"
- make command COMMAND="php artisan cache:clear"
- make command COMMAND="php artisan test --coverage"

## References

- https://github.com/sherifabdlnaby/kubephp
- https://laravel.com/docs/9.x/http-client
