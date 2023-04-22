# Mariadb, RestAPI and Vanilla PHP Website Running on Different Containers. 

For practicing purpose of Docker basic knowledge I got for the last days, I decided to create a very very simple project using Mariadb, PHP Framework-X and vanilla PHP.

This project consists in having three different systems running on diffent Docker Containers and communicating each other, so: 
    1. I created an image based on the official mariadb image and running it on a container, 
    2. I created an API using framework-F which queries Mariadb database, 
    3. finally I created a website using vanilla PHP and Bootstrap which consumes the API for gettting data. 
   
## How to run

### Installing dependencies for PHP Framework-X API project
```
cd api
```
```
composer install
```

### Build images
```
docker build -t dev-mysql-image -f api/db/Dockerfile .
```
```
docker build -t dev-php-api-image -f api/Dockerfile .
```
```
docker build -t dev-php-website -f website/Dockerfile .
```

### Running containers

On project root folder:
```
docker run -d -p 33336:3306 -v $(pwd)/api/db/data:/var/lib/mysql --rm --name dev-mysql-container dev-mysql-image
```
```
docker run -d -p 9001:8080 -v $(pwd)/api/data:/app --rm --name dev-php-api-container dev-php-api-image
```
```
docker run -d -p 9002:8080 -v $(pwd)/website/data:/www --rm --name dev-website-container dev-website-image
```

### Executing sql script for creating and populating database
```
docker exec -i dev-mysql-container mysql -uroot -p12345678 < api/db/script/initialize_db.sql
```


Now you can open your browser and type http://127.0.0.1:9002/products 
