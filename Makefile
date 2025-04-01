.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t docker-php-kata-examen .

build-container:
	docker run -dt --name docker-php-kata-examen -v .:/540/Kata-examen docker-php-kata-examen
	docker exec docker-php-kata-examen composer install

start:
	docker start docker-php-kata-examen

test: start
	docker exec docker-php-kata-examen ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it docker-php-kata-examen /bin/bash

stop:
	docker stop docker-php-kata-examen

clean: stop
	docker rm docker-php-kata-examen
	rm -rf vendor
