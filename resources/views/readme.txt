STEPS ON HOW TO INSTALL LARAVEL UI
- composer require laravel/ui
- php artisan ui bootstrap --auth
- npm install
- npm run dev

There are 3 packages you can use for laravel authentication
- Laravel Jetstream
- Laravel ui
- 

each time you create a model you are going to create a migration with it.
Anyother column you want to add in the table, add it in the user table in your vs code. Even if you want to remove anything from the table still do the same thing. You don't need to touch the table they've already created it for you.

in order to push the tables to the database you will type in a new terminal 'php artisan migrate' then enter. Don't do migration until you have finished editing your users table. If it shows there is nothing to migrate type 'php artisan migrate:rollback' then migrate again with 'php artisan migrate'.

ANOTHER CLASS;

in the form, when you try to register, it will throw an error because the phone number doesn't have any value. any column you create and it doesn't show any value, it will throw an error.
Even with the phone number being default it will still throw error because you did migration so any changes you are making here will not take effect. you have run migration before adding default value. Don't use this command always(rollback).
do php artisan migrate:rollback (rollback the last migration you did)- if you check your ecom database you won't see any data there. Anytime you are creating your migration make sure you have added everything so you don't have to rollback often. Then you will migrate it back with 'php artisan migrate'.

to create a model type 'php artisan make:Model Post -m (the m means create a migration for this particular model). After typing all the necessary tables then you will type 'php artisan migrate' then enter then posts will show on your database.

ASSIGNMENT
in the assignment , a resturant website where you can come and make order. do your scalfolding. create a fresh project. design how your table is going to be. make sure you add more columns

php artisan route:clear
php artisan rollback
php artisan migrate
php artisan cache:clear 
php artisan config:clear
{{ old('name') }} retains the value of what you have typed when you make a mistake
Every form in laravel must have @csrf if not the form wouldn't be able to submit

ANOTHER CLASS 2:
to make middleware you will do 'php artisan make:Middleware AdminMiddleware then click enter and it will automatically create the AdminMiddleware for you. You must register every middleware in Kernel.php
Register your AdminMiddleware in your kernel.php by giving it a name 'isAdmin'. Close your kernel.php but know the name you gave it. Then return to your AdminMiddleware. Once you create the AdminMiddleware, your return $next(request) will be the one to take you to where you are being authenticated to. Cut out the line and write 
if(Auth::