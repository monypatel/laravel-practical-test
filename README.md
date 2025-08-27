## Run the Migration command 
It will create a table users,customers and orders and also add the testing data on customers and orders  table using seeder.
php artisan migrate

## Register API 
API : {{URL}}/api/register 
Method: POST
Payload : {
    "username": "xya",
    "email": "xyz@gmail.com",
    "password": "xxxx"
}

## Login API
API : {{URL}}/api/login 
Method: POST
Payload : {
    "email": "xyz@gmail.com",
    "password": "xxxx"
}

## API : Retrieve the top 5 customers details spent the most money on orders in the last year 
API : {{URL}}/api/get-customer-details
Method: Get
