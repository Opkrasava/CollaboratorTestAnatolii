init:
	docker-compose run --rm an_yii2app composer create-project --prefer-dist yiisoft/yii2-app-basic yii2app

up:
	docker-compose up -d --build

bash:
	docker-compose exec app bash

migrate:
	docker-compose exec app php bin/console doctrine:migrations:migrate

down:
	docker-compose down


