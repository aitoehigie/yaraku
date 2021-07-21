## Requirements
- [Docker](https://docs.docker.com/install)
- [Docker Compose](https://docs.docker.com/compose/install)

## Local Setup
1. Clone the repository.
1. Start the containers by running `docker-compose up -d` in the project root.
1. Install the composer packages by running `docker-compose exec laravel composer install`.
1. Access the Laravel instance on `http://localhost` (If there is a "Permission denied" error, run `docker-compose exec laravel chown -R www-data storage`).

Note that the changes you make to local files will be automatically reflected in the container. 

## Persistent database
If you want to make sure that the data in the database persists even if the database container is deleted, add a file named `docker-compose.override.yml` in the project root with the following contents.
```
version: "3.7"

services:
  mysql:
    volumes:
    - mysql:/var/lib/mysql

volumes:
  mysql:
```
Then run the following.
```
docker-compose stop \
  && docker-compose rm -f mysql \
  && docker-compose up -d
``` 

## Testing
Run this command in the root of the project to run all tests `./vendor/bin/phpunit`


## Remote Setup 
1. Provision an AWS EC2 instance and ssh into it.
2. Install docker. Instructions here: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04).
3. Install docker composer. Instructions here: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04.
4. clone the git repo of this project : `git clone https://github.com/aitoehigie/yaraku.git`.
5. change your working directory into the project and run `docker-compose up -d`.
6. Install all packages by running `docker-compose exec laravel composer install`.
7. Also run `docker-compose exec laravel chown -R www-data storage` to solve permission issues.
8. Run `docker ps` and note the id of the container running the Laravel application.
9. Now run `docker container exec -it <container id> php artisan migrate`, to create all the database tables.
9. Visit the IP address of your EC2 instance to view the running application.


## Usage
1. You can add books by supplying the necessary details in the form.
2. Kindly note that you will not be able to add books that already exist in the database.
3. You can also update the book author names by clicking on the edit icon by each name.
4. The application also has a search capability to search for books based on names of the books and their authors.
5. You can also download book datasets in CSV and XML file format.



