#!/bin/bash
TODAY := $(shell date +'%Y-%m-%d')
CURRENT_BRANCH := $(shell git rev-parse --abbrev-ref HEAD)

help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

gitpush: ## git push m=any message
	clear;
	git add .; git commit -m "$(m)"; git push;

pint: ## formatea el codigo
	clear;
	docker exec -it cont-lr-apache sh -c "cd /var/www/lr-app; composer pint"

migrate: ## artisan migrate
	clear;
	docker exec -it cont-lr-apache sh -c "cd /var/www/lr-app && php artisan app:cache-clear && php artisan migrate --force"
