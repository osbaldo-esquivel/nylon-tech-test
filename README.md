## About Nylon Technology Test

This web application will allow the addition of users to the database with details like first name, last name, email, and Social Security Number. There is an admin page that will allow marking a user as disabled and the table displaying the user details can be sorted by column.

## Running the application

- Download the zip file from GitHub (https://github.com/osbaldo-esquivel/nylon-tech-test)
- Extract the zip to a folder of your choice
- Ensure you have docker compose installed
- In the application folder, run `./vendor/bin/sail up` or you can run in detached mode `./vendor/bin/sail up -d`
- Once the containers are running, enter the application docker shell `docker exec -it nylon-tech-test_laravel.test_1 bash` from the application root directory
- Execute `php artisan migrate` to run migrations
- Open a web browser and navigate to `localhost:8080`

## Adding users

- Fill out the fields and hit submit
- If there are errors, they will be listed. Fix them and resubmit.
- On success, you will see a success message

## Administrating users

- Click on the `Admin` button from the home page or navigate to `localhost:8080/admin`
- Sort users by clicking on the column name
- Disable a user by clicking the disable action button
