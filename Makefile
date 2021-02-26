.PHONY: seed migrate

seed:
	./artisan db:seed

migrate:
	./artisan migrate:fresh --seed
