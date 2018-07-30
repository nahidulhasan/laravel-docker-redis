
# Laravel-docker-redis

Simple example: How to use laravel and redis using docker compose

## Installation 

 ```Clone the repo```
 
Now run the following commands from from project root directory.Before Running the commands be sure that you have installed docker.You will get install instructions from this
 [link](https://docs.docker.com/)

```sh
docker-compose build

```


```sh
docker-compose up -d

```

Now browse project 

 ```
 http://localhost:8083/

```

Now the system is ready and you can practice redis. You can see the example in routes folder web.php page. If you want to modify database name, password etc, you have to change in docker-compose.yml file.
