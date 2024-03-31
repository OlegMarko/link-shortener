start:
	./vendor/bin/sail up -d
	./vendor/bin/sail artisan migrate
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run build

stop:
	./vendor/bin/sail down
