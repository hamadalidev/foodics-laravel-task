
# Foodics Task

## Tecnology
- php 8.1.11
- laravel 9
- Mysql

## Design Pattern
- Repository design pattern.
- Observer design pattern.
- Strategy design pattern

##  Application Architecture
- Monolithic architecture
- Implemented the SOLID principle for application architecture. Used final, abstract, interface for building application architecture

## Code Quality
- Laravel pint (./vendor/bin/pint)  https://drive.google.com/file/d/1KZJgiWIuKBhEYvq557qHdqmOhJqWk20l/view?usp=share_link
- Larave psalm (./vendor/bin/psalm) https://drive.google.com/file/d/1rCYIrWbB4A0UIMJEzHH_siuRLKOLusf_/view?usp=share_link
- Add php doc and return types.

## Laravel Feature Used
- Migration
- Seeder
- ORM
- Model Observer
- Exception
- Form Request
- Unit Test
- Queue
- Jobs
- Enum
 
## Service Provider
- ObserverServiceProvider (For building custom event listener/observer)
- RepositoryServiceProvider (For link interface with class)

## Email
Used mjml to design email UI.
https://mjml.io/

## Requirment
https://drive.google.com/file/d/1RF_m5n4afc29Rzl3qfKJ6i-bBRivqeIS/view?usp=share_link

## Database Design
- ERD https://drive.google.com/file/d/14xD7lpT2G9yvVKM8OWs6v0udmDmjS6D7/view?usp=share_link

### Database Use Cases
- One Ingredient has one Ingredient Stock
- One Product has many Ingredients
- One Order has many Order Items
- One Orer Item has one Product

## Demo video link

## How to project setup
```bash

# git clone
git clone https://github.com/hamadalidev/foodics-laravel-task.git

# copy example (set database and queue setting)
cp .env.example .env

# composer install
composer install

# clear cache
php artisan optimize

# run migration
php artisan migrate

# run seeder
php artisan db:seed

# serve application
php artisan serve

# run worker
php artisan queue:work

# run test case
php artisan test
```

## Order API.
### URL
http://127.0.0.1:8000/api/order

## Request Payroll
{
    "products": [
        {
        "product_id": 1,
        "quantity": 1
        }
    ]
}

I implemented task requirements. I added order API with some extra validation.


If the order product ingredients stock is available then the order is created else returns a validation error message.
(Ingredient Stock in not available for this order)

### Usecase 1
current stock: 
- 20kg Beef
- 5kg Cheese
- 1kg Onion

product ingredients stock need:
- 150g Beef
- 30g Cheese
- 20g Onion

Result: Now stock is available for the order to create. we saved the order

### Usecase 2
current stock:
- 20kg Beef
- 5g Cheese
- 1kg Onion

product ingredients stock need:
- 150g Beef
- 30g Cheese
- 20g Onion

Result: Now Cheese stock is not available we did not save the order.

### PHP Unit Test
I added three test case for order api.
- test order create api
- test order create api validation
- test order create api if stock not available for order complete




