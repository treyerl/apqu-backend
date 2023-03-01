# APQU Back End

> APQU is just a randomly generated string.

Start up docker containers and connect to `php-container`:

```bash
./run.sh
```

[Windows `./run.cmd` untested.]

Once in `php-container` create the database schema:

```bash
con doctrine:schema:create
```

Navigate to `http://localhost:18080/api` and create two Heroes by opening `POST /api/heroes` click on `Try it out` and add the following text one by one in the text field and run `Execute`.

```json
{
    "name": "Black Widow",
    "superpower": "spy",
    "realname": "Natasha Romanov",
    "aka": null
}
```

```json
{
    "name": "Hulk",
    "superpower": "can control his anger",
    "realname": "Bruce Banner",
    "aka": "The Incredible Hulk, The Green"
}

A JSON list of heroes should be available [here](http://localhost:18080/api/heroes.json).

Check out `apqu-frontend` in folder next to `apqu-backend` and compile it. The `nginx` container of this repository points to the `build` directory of the frontend repo. Once this is done, you can open `http://localhost:18080`.
