# Search and Stay - Test

 

### Initial setting

1. Configure create database and configure access data in the .env file
2. Run `php artisan migrate` to create the necessary tables



### Postman API tests

1. Import the collection in Postman `Search-and-Stay.postman_collection.json`
2. Configure, if necessary, in the collection, the variable "API_URL" current value (http://127.0.0.1:8000/api)  
3. Register user in `Auth Register`
4. Insert book in `Books/Book add`
5. Insert store in `Stores/Store add`
6. Insert book/store relationship in `BookStore/BookStore add relationship`



### API Endpoints

```
GET|HEAD        api/books ................................... books.index › API\BookController@index
POST            api/books ................................... books.store › API\BookController@store
GET|HEAD        api/books/{book} .............................. books.show › API\BookController@show
PUT|PATCH       api/books/{book} .......................... books.update › API\BookController@update
DELETE          api/books/{book} ........................ books.destroy › API\BookController@destroy
POST            api/bookstore/{book}/{store} ......................... API\BookStoreController@store
DELETE          api/bookstore/{book}/{store} ....................... API\BookStoreController@destroy
POST            api/login ................................................. API\AuthController@login
POST            api/logout ............................................... API\AuthController@logout
POST            api/register ........................................... API\AuthController@register
GET|HEAD        api/stores ................................ stores.index › API\StoreController@index
POST            api/stores ................................ stores.store › API\StoreController@store
GET|HEAD        api/stores/{store} .......................... stores.show › API\StoreController@show
PUT|PATCH       api/stores/{store} ...................... stores.update › API\StoreController@update
DELETE          api/stores/{store} .................... stores.destroy › API\StoreController@destroy
```



### Environment

- **Laravel version**: 10.48.8
- **PHP**: 8.2

### Used:

- [Eloquent: API Resources](https://laravel.com/docs/10.x/eloquent-resources#main-content)
- [APIResource Routess - Controllers](https://laravel.com/docs/10.x/controllers#api-resource-routes)
