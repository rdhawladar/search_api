# Project Details
This is a API implementation project developed using Lumen - a PHP microframwork.  

# Project Structure
    .
    |-- app                 # Holds the base code of the application. 
    |                       # Containing Services, Repositories, 
    |                       # Models, Controller, Events etc. 
    |-- bootstrap           # Start up bootstraping
    |-- config              # Configuration files and Constants
    |-- database            # Migration, Seeder, Factories etc.
    |-- public              # Contains index, .htaccess, asstes
    |-- resources           # Contains frontend resources if any
    |-- routes              # Route folder to manage application rooute
    |-- storage             # Stores application cache and logs
    |-- tests               # Contains TestCases 
    |-- .env.example        # example/structure of .env file
    |-- artisan             # It is for command line interface
    |-- composer.json       # Handles project dependencies and libraries
    |-- db_health_check.sh  # Shell command for mysql health check after docker up
    |-- docker-compose.yml  # YAML file defining services, networks and volumes for docker-compose.
    |-- dockerfile          # Used to build docker image.
    |-- Makefile            # Makefile to run commands after docker up
    |-- phpunit.xml         # Configuration of testcase and testing files
    |-- readme.md           # Explains project installation and other informations
    |-- test-report.xml     # Test case report

# Tools and Technology
    Lumen 6.0 (Microservice Framework)
    MySQL 8.0
    PHP 7.3
    Docker

# Installation

## With Docker:
You must need docker and docker-compose installed and running in you system.
#### Step-1
Copy/rename `.env.example` file as `.env`. No need to change anything. It contains configuration data of MySQL container service.

#### Step-2
Start application using docker-compose file. Run this following command:
```bash
docker-compose up -d
```

Now you can see the wolcome message to the following link: [localhost:8000](http://localhost:8000)

## Without Docker Container:
You must need composer, apache and MySQL installed and running in you system.
#### Step-1
Copy/rename `.env.example` file as `.env`. Change the `DB_HOST, DB_USERNAME, DB_PASSWORD` value as per your mysql setup. MySQL default `DB_HOST` should be `localhost`, `DB_USERNAME` should be `root` and `DB_PASSWORD` should be null.

#### Step-2
Create datbase `restaurants`.

#### Step-3
Run the follow commands one by one: 
```bash
composer install
php artisan migrate --seed 
php -S localhost:8000 -t public
```

Now you can see the wolcome message to the following link: [localhost:8000](http://localhost:8000)

# Test Case Execution
Run the following command to execute test cases:
```bash
vendor/bin/phpunit ./tests
```
**For docker** you can use the following command to run test cases without entering into the container: 
```bash
docker exec search_api_website_1  vendor/bin/phpunit ./tests/
```
Here `search_api_website_1` is the webserver container name.

# Generating Test Report
Run the following command to generate test report for all the test cases: 
```bash
vendor/bin/phpunit --log-junit test-report.xml
```
**For docker** you can use the following command to generate test report without entering into the container: 
```bash
docker exec search_api_website_1  vendor/bin/phpunit ./tests/  --log-junit test-report.xml
```

Here `search_api_website_1` is the webserver container name.

Test report will be generated in the root folder as `test-report.xml`.


# REST API 
The REST API to the search app is described below.

## Version 1:
### Get list of all Restaurants:
#### Request  

Method:  `GET /thing/api/v1/restaurants`  

Endpoint: [http://localhost:8000/api/v1/restaurants](http://localhost:8000/api/v1/restaurants)


### Get list of all Restaurants by sorting:
**Request**:  

Method: `GET`  

Parameter: `sort_by`

Listed parameter values:  `best match, newest, rating average, popularity, average product price, delivery costs or the minimum order amount costs.`  

Endpoint example: [http://localhost:8000/api/v1/restaurants?sort_by=best match](http://localhost:8000/api/v1/restaurants?sort_by=bestmatch)


### Search list of restaurants by name:
#### Request:  

Method: `GET`  

Endpoint example: [http://localhost:8000/api/v1/restaurants](http://localhost:8000/api/v1/restaurants)

Parameter: `search_by`

Parameter value: Restaurant `name` field value

Endpoint example: [http://localhost:8000/api/v1/restaurants?sort_by=pizza](http://localhost:8000/api/v1/restaurants?search_by=pizza)

## Version 5:
#### Request  

Method:  `GET /thing/api/v5/restaurants`  

Endpoint: [http://localhost:8000/api/v5/restaurants](http://localhost:8000/api/v5/restaurants)

Other things remain same for different versioning. 

