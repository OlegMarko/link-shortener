## About Link Shortener

Laravel Project
- sail
- pgsql

### Run App locally
 - clone repository
 - `cd link-shortener`
 - `cp .env.example .env`
 - `composer install`
 - `./vendor/bin/sail up -d`
 - `./vendor/bin/sail artisan migrate`
 - `./vendor/bin/sail npm install`
 - `./vendor/bin/sail npm run build`

### or through Makefile commands
 - clone repository
 - `cd link-shortener`
 - `cp .env.example .env`
 - `make start`
 - `make stop`
