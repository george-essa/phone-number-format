install:
	sh docker-install.sh

build:
	docker-compose up --build -d

start:
	docker-compose up -d

stop:
	docker-compose down


