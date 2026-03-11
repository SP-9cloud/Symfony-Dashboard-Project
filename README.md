# Symfony Dashboard Assignment

## Tech Stack
- Symfony 6
- PHP 8.2
- MySQL
- Doctrine ORM

## Architecture
- Domain Driven Design (DDD)
- CQRS
- Event Driven Architecture
- Asynchronous Processing
- Optimized Read Model
- Caching Layer

## Features
- Dashboard displaying site data
- Pagination for large dataset
- 100,000+ records
- Logging strategy implemented
- Performance measurement added

## Setup

Clone repository:

git clone <repo-url>

Install dependencies:

composer install

Run migrations:

php bin/console doctrine:migrations:migrate

Seed database:

php bin/console app:seed-dashboard-data

Run server:

symfony serve

Open:

http://localhost:8000/dashboard
