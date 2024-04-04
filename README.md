# Memo Test

This project is the backend support for the Memo Test application. It provides services to store, retrieve and update games and user sessions.

## Running this project

### Docker

Assuming that you have already setted up Docker in your machine, you need to run:

Ensure you have all the required environment variables in the .env file. Check specially if the DB_HOSTNAME is set as "mysql", since this is the way that the Laravel container will communicate with the database container.

Then, run the Sail command from the project root folder, 

``` ./vendor/bin/sail up -d ```

If you need to rebuild the project, then use 

``` ./vendor/bin/sail up -d --build ```

To access the container console and run other needed commands, you might use

``` ./vendor/bin/sail bash ```

## Running tests

The included tests requires a connection to a testing database. Thus, you need to ensure a database for this purpose is running, and the variables in .env.testing are correct.
Once the database is ready, you can run the migrations using ```php artisan migrate --env="testing"```.

To run the tests, simply execute ```php artisan test```.

## GraphQL interface

GraphiQL is an graphic interface to test the GraphQL API. To use it, you have to access the route '/graphiql' (usually, it might look like 'http://localhost/graphiql')