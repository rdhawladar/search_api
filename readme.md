# Project Details
This is a API implementation project developed using Lumen - a PHP microframwork.  

# Project Structure
    .
    |-- app                 # 
    |-- bootstrap           # 
    |-- config              # 
    |-- database            # 
    |-- public              # 
    |-- resources           # 
    |-- routes              # 
    |-- storage             # 
    |-- tests               # 
    |-- .env.example        # 
    |-- artisan             # 
    |-- composer.json       # 
    |-- db_health_check.sh  #    
    |-- docker-compose.yml  #    
    |-- dockerfile          # 
    |-- LICENSE             # 
    |-- Makefile            # 

# Tools and Technology
    Microservice Framwork Lumen
    MySQL 
    PHP 7.2




# Installation

## With Docker:

#### Step-1
Start `ElasticSearch` using docker-compose file. Run this command `docker-compose up -d`

#### Step-2
Sing up [Mailtrap.io](https://mailtrap.io/). Change value of `SMTP_USERNAME` and `SMTP_PASSWORD` in `.env` file.

```bash
docker run -v YOU_TARGET_DIRECTORY:/data --env-file .env --network host pbrm5:v1.0
 ```

## Without Docker Docker:

# Test Case Executing

Run the following command to execute test cases:
```bash
vendor/bin/phpunit --log-junit report.xml
```

# Generating Test Report

Run the following command to generate test report: 
```bash
vendor/bin/phpunit --log-junit report.xml
```
Test report will be generated in the root folder as `report.xml`.