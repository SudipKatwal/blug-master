# BlugMaster Project

This project is based on managing different types of user for blug.

### Installation:

`git clone` this repository and `cd` inside the project root, then enter the following commands

1. `composer install --prefer-dist --div -vvv` (might take a while to complete)

2. `cp .env.example .env`

3. `php artisan key:generate`

    Now open `.env` file and make necessary changes to the **DB_** section.
    
    **Yes, of course, you'll have to setup a database and it's user already before the next step!**
    Otherwise, exactly what settings were you going to put in the _DB\__ section of the `.env` file? :P

4. `php artisan migrate`

5. `php artisan db:seed`

6. `php artisan serve`

    Open the browser and go to `http://localhost:8000`

7. `php artisan route:clear`

    You may use the route:clear command to clear the route cache

8. `php artisan route:cache`

    Using the route cache will drastically decrease the amount of time it takes to register all of your application's routes. 

### Please Note

This software uses the [Laravel](https://laravel.com/ "Laravel") framework.

Currently, [Laravel 5.6](https://laravel.com/docs/5.6 "Laravel 5.4") is being used.

If you are getting any error, it is most probably due to 
unfulfilled [requirements](https://laravel.com/docs/5.6#server-requirements "Server Requirements") 
of the framework itself.

Also, make sure that you have proper database drivers. For an example, make sure 
you have installed php7.1-mysql package so that you can use mysql database with php7.1 in your project.