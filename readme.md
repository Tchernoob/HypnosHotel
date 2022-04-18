# HypnosHotel

HypnosHotel est un site internet permettant de gérer les établissements hotelier de la société Hypnos. 

## Installation

## Environnement de développement

### Pré-requis
 * PHP 8.1.4
 * Composer
 * Symfony CLI
 * Docker
 * Docker-compose

 Vous pouvez vérifier les pré-requis (sauf docker et docker-compose) avec la commande suivante (de la CLI Symfony) :
 
`````bash
symfony check:requirements
`````

## Lancer l'environnement de développement

`````bash
docker-compose up -d
symfony serve -d
`````

## Lancer des tests 
`````bash
php bin/phpunit --testdox
`````

