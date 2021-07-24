.PHONY: install start stop tests

install:
	cp .env.example .env
	docker-compose build
	docker-compose up -d
	docker-compose run --no-deps --rm phpfpm composer install
	docker-compose run --no-deps --rm phpfpm php artisan migrate:fresh
	docker-compose run --no-deps --rm phpfpm php artisan recover:db
	docker-compose run --no-deps --rm phpfpm php artisan key:generate
	docker-compose run --no-deps --rm phpfpm npm install && npm run dev

start:
	docker-compose up -d

stop:
	docker-compose down

tests:
	docker-compose run --no-deps --rm phpfpm php artisan test
