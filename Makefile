init:
	docker-compose run --rm an_yii2app composer create-project --prefer-dist yiisoft/yii2-app-basic yii2app

up:
	docker-compose up -d --build

down:
	docker-compose down

test:
	docker-compose exec an_yii2app bash -c "vendor/bin/codecept build && vendor/bin/codecept run"
