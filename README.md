# Phone Numer Format
------------

## Features
- :wrench: Configure and scale your services using Docker Compose
- :building_construction: MVC structured 
- :gift: Organize and enhance the reusability of code in large projects








## About Project
Create a single page application that uses the database provided (SQLite 3) to list and categorize country phone numbers.
Phone numbers should be categorized by country, state (valid or not valid), country code and number.
The page should render a list of all phone numbers available in the DB. It should be possible to filter by country and state. Pagination is an extra.



## Structure

the project follow structural practice and contains several packages:

- Laravel - as a backend framework.
- Angular - as frontend framework.
- Docker - as containerizing technology
- Docker compose - as an orchestration for docker containers 

## Getting Started
To get started, make sure you have Docker installed on your system or use make file to install it but make sure you have make installed as such:
```sh
apt install make 
make install
```

Next, navigate in your terminal to the directory you cloned this project, and spin up the containers for the web server by running
```
docker-compose up --build -d
```

Bringing up the docker compose network with site instead of just using up, ensure that only our site's containers are brought up at the start, instead of all of the command containers as well. the following are built for our web server, with their exposed ports detailed:

- **webserver** : `:8080`
- **angular app**: `:80`


## API Collection of the project postman
[Number format collection](https://www.getpostman.com/collections/6c1df7cbe0e5d8ce525a)

## Dont like Docker, no problem use make
- make install (to install docker and docker-compose required for the project)
- make build (to build project containers)
- make start (to start the project containers anytime after build)
- make stop (to stop the project containers)






