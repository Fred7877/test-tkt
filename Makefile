.PHONY: install start stop

install:
	cp .env.example .env
	docker-compose build
	docker-compose run --no-deps --rm test-tkt_laravel.test_1 composer install

start:
	docker-compose up -d
	docker-compose exec -d wihp_app symfony server:start

stop:
	docker-compose down
