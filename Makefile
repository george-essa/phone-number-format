install:
	sh docker-install.sh

build:
	chown ${$USER}:${$USER} -R volumes/*
	chmod -R a+w volumes/*
	docker-compose up --build -d

start:
	docker-compose up -d

stop:
	docker-compose down

in:
	docker exec -it $(shell docker ps -qf "name=app") bash


list:
	docker ps


