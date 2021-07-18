[![Build Status](https://github.com/terdia/DataStructureAndAlgorithmsPHP/actions/workflows/ci.yml/badge.svg)](https://github.com/terdia/DataStructureAndAlgorithmsPHP/actions/workflows/ci.yml)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Data Structure and Algorithms PHP

## Build the image 

```bash 
docker image build --tag terdia07/php-7.4 .
```

## Run th container 

```bash 
docker container run -d --name dsa --publish 80:80 --mount type=bind,source="$(pwd)",target=/var/www/html terdia07/php-7.4
```

### Enter the container 
`docker exec -it dsa bash` 

#### Install phpunit and setup autoloading by running:
 `cd /var/www/html && composer install` 

#### Run test: 
`./vendor/bin/phpunit tests --testdox`

#### Visit: http://localhost



    
    
   
    



