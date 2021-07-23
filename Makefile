.PHONY: install start stop

install:
	cp .env.example .env
	docker-compose build
	docker-compose up -d
	docker-compose run --no-deps --rm phpfpm composer install
	docker-compose run --no-deps --rm phpfpm php artisan migrate:fresh
	docker-compose run --no-deps --rm phpfpm php artisan recover:db
	docker-compose run --no-deps --rm phpfpm php artisan key:generate

start:
	docker-compose up -d

stop:
	docker-compose down
