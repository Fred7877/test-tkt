# Installation
###### Start the docker
`./vendor/bin/sail up -d`

###### fill the database with the file mock_data.json
`php artisan recover:db`

###### Compilation and install packages JS
`./vendor/bin/sail npm install && npm run dev`

###### Run test
`./vendor/bin/sail php artisan test`
