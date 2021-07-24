# Installation
`make install`
- copy .env.example to .env
- build the docker
- run the docker
- execute composer install into the docker
- execute php artisan migrate into the docker
- execute php artisan recover:db into the docker

##### Start the docker
`make start`

##### Stop the docker
`make stop`

##### Documentation API
generate the documentation
`php artisan scribe:generate`
See the documentation :
(set APP_URL in .env)
[BASE_URL]/docs/index.html

##### Run tests
`make tests`
