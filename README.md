## About

[GraphQL](http://graphql.org/) is a query language for API, with this tools clients can define specific request, so they can get predictable results.

It's simple implementation integrating [GraphQL](http://graphql.org/) with [Laravel](https://github.com/laravel/laravel) 

## How To Use

**Clone Repo**

	https://github.com/rizalreza/laravel-graphql.git

**Dependencies**
* [rebing/graphql-laravel](https://github.com/rebing/graphql-laravel)
* [folklore/graphql](https://github.com/Folkloreatelier/laravel-graphql)

**Setup Composer.json**

	"require": {
        "folklore/graphql": "^1.0",
        "rebing/graphql-laravel": "^1.9"
    },

**Update Composer**

	composer update

**Setup Database**

	* Create new database
	* Edit credentials database on .env file
		DB_DATABASENAME=
		DB_USERNAME=
		DB_PASSWORD=
			

**Migrate**

	php artisan migrate

**Run Application**

	php artisan serve

**URL**

	http://127.0.0.1:8000/graphiql

**Demo**

* Create data

![CreateMutation](https://i.imgur.com/kSJ6GVo.png)

* Show all data

![ShowAll](https://i.imgur.com/YvjSZXp.png)

* Show with parameter

![ShowWithParameter](https://i.imgur.com/9V0YKFi.png)

* Show specific

![ShowSpecific](https://i.imgur.com/gY74poh.png)

* Update

![ShowWithParameter](https://i.imgur.com/n3vq4Pe.png)
