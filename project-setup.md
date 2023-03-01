# Project Setup

Protocol of tasks that have been performed in app folder (following the [Symfony Tutorial](https://symfony.com/doc/current/setup.html)):

1. Comment line `- ../test-frontend/public/frontend:/var/www/app/public/frontend` in `docker-compose.yaml` file.
2. Start Docker containers:

    ```bash
    ./run.sh
    ```

3. Create a Symfony project

    ```bash
    symfony check:requirements
    symfony new . --version="6.2.*" --no-git
    ```

4. Uncomment line from step 1 and restart docker composition

    ```bash
    exit
    docker-compose down
    ./run.sh
    ````

5. Install `doctrine` ORM

    ```bash
    composer require symfony/orm-pack
    composer require --dev symfony/maker-bundle
    ```

    (No need to add Docker files).

6. Make an entity `Hero`

    ```bash
    con make:entity
    ```

7. ID --> UUID

    ```bash
    composer require symfony/uid
    ```

    Replace ID with UUID: see [Hero.php](./app/src/Entity/Hero.php) for result.

8. Create Data Schema

    ```bash
    con doctrine:schema:create
    ```

9. Install API Platform

    ```bash
    composer require api
    ```

10. Navigate to `http://localhost:18080/api` and create two Heroes by opening `POST /api/heroes` click on `Try it out` and add the following text in the text field and run `Execute`.

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
    ```

11. Sidenote: `http://localhost:18080/` points to the front-end project; Nginx (running in a separate container) is configured to only route `/api` to the backend.
