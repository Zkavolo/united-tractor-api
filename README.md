# API Documentation

## Authentication
***
### Register
```json
[POST] /register
```

### Request
```json
{
    "name" : "Axel Barlian",
    "email" : "example@gmail.com",
    "password" : "123"
}
```

### Response
```json
{
    "message": "Pendaftaraan Berhasil"
}
```
***

### Login
```json
[POST] /login
```

### Request
```json
{
    "email" : "example2@gmail.com",
    "password" : "123"
}
```

### Response
```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MjMzMDEzNDMsImV4cCI6MTcyMzMwNDk0MywibmJmIjoxNzIzMzAxMzQzLCJqdGkiOiJtb3gzc1gwQ2VtblRrRlRVIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tgzAs1RWlhqWooNpi3osDtTjbo_RHQ44NyRtgprwcvY",
    "token_type": "bearer",
    "expires_in": 3600
}
```
***

### ME
```json
[POST] /me
```

### Request
Bearer Token in autherization


### Response
```json
{
    "id": 1,
    "name": "Axel Barlian",
    "email": "example@gmail.com",
    "created_at": "2024-08-10T14:40:27.000000Z",
    "updated_at": "2024-08-10T14:40:27.000000Z"
}
```
***

### Logout
```json
[POST] /logout
```

### Request
```json
{
    "token" : "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.     eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MjMzMDEzNDMsImV4cCI6MTcyMzMwNDk0MywibmJmIjoxNzIzMzAxMzQzLCJqdGkiOiJtb3gzc1gwQ2VtblRrRlRVIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.tgzAs1RWlhqWooNpi3osDtTjbo_RHQ44NyRtgprwcvY"
}
```


### Response
```json
{
    "message": "Successfully logged out"
}
```
***

## Category Product
***
### Get All
```json
[GET] /category-products
```

### Response
```json
[
    {
        "id": 1,
        "name": "test2",
        "created_at": "2024-08-10T12:08:06.000000Z",
        "updated_at": "2024-08-10T12:11:57.000000Z"
    }
]
```
***

### Get One
```json
[GET] /category-products/{id}
```

### Response
```json
{
    "id": 1,
    "name": "test2",
    "created_at": "2024-08-10T12:08:06.000000Z",
    "updated_at": "2024-08-10T12:11:57.000000Z"
}
```
***

### Create
```json
[POST] /category-products
```
### Request
```json
{
    "name" : "boxes"
}
```

### Response
```json
{
    "name": "boxes",
    "updated_at": "2024-08-10T14:58:25.000000Z",
    "created_at": "2024-08-10T14:58:25.000000Z",
    "id": 2
}
```
***

### Update
```json
[PUT] /category-products/{id}
```
### Request
```json
{
    "name" : "pills"
}
```

### Response
```json
{
    "name": "pills",
    "updated_at": "2024-08-10T14:59:57.000000Z",
    "created_at": "2024-08-10T14:58:25.000000Z",
    "id": 2
}
```
***

## Product
***
### Get All
```json
[GET] /products
```

### Response
```json
[
    {
        "id": 2,
        "product_category_id": 1,
        "name": "box",
        "price": 100,
        "image": null,
        "created_at": "2024-08-10T13:19:12.000000Z",
        "updated_at": "2024-08-10T13:19:12.000000Z"
    }
]
```
***
### Get One
```json
[GET] /products/{id}
```

### Response
```json
{
    "id": 2,
    "product_category_id": 1,
    "name": "box",
    "price": 100,
    "image": null,
    "created_at": "2024-08-10T13:19:12.000000Z",
    "updated_at": "2024-08-10T13:19:12.000000Z"
}
```
***

### Create
```json
[POST] /products
```

### Request
in form data :
product_category_id = 1
name = another box
price = 100
image = filled

### Response
```json
{
    "product_category_id": "1",
    "name": "another box",
    "price": "100",
    "image": "images/WHIFhwQQCFXnj4JGhyrorK9bCzP9i838Uqz5u2JV.png",
    "updated_at": "2024-08-10T15:05:31.000000Z",
    "created_at": "2024-08-10T15:05:31.000000Z",
    "id": 3
}
```
***

### Update
```json
[POST] /products/{id}
```

### Params
_method Value : PUT

### Request
in form data :
name = new boxes
price = 1000
image = null

### Response
```json
{
    "id": 3,
    "product_category_id": 1,
    "name": "new boxes",
    "price": "1000",
    "image": null,
    "created_at": "2024-08-10T15:05:31.000000Z",
    "updated_at": "2024-08-10T15:07:59.000000Z"
}
```
***

### Update
```json
[DELETE] /products/{id}
```

### Response
```json
1
```
***


