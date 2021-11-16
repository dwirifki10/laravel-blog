# LARAVEL BLOG
Laravel Blog is a blog website built using laravel and libraries such as Bootstrap, Laravel UI, CKeditor. This app contains content management, content page and also user access

## Database Architecture
![alt text](https://github.com/dwirifki10/laravel-blog/blob/main/laravel_blog/docs/database_architecture.png)

 
 ## Instruction of Usage
 **clone repository**
> git clone https://github.com/dwirifki10/laravel-blog.git

 <br/>
 
**set configuration**
> copy env.example -> .env

> php artisan key:generate

<br/>

**set configuration database**
>DB_DATABASE=*your database*

>DB_USERNAME=*your username*

>DB_PASSWORD=*your password*


<br/>

**set configuration email using smtp google**
>MAIL_HOST=*smtp.google.com*

>MAIL_PORT=*587 or 465*

>MAIL_USERNAME=*your email*

>MAIL_PASSWORD=*your password or your code for 2 factor authentication*

>MAIL_ENCRYPTION=*tls or ssl*

>MAIL_FROM_ADDRESS=*your email*

*if you don't enable 2 factor authentication, enable "less secure" on your google account [here](https://myaccount.google.com/lesssecureapps)*

 <br/>
 
**open terminal and running app**
> composer install or composer update

> npm install && npm run dev

> php artisan migrate

> php artisan db:seed --class=CategorySeeder

> php artisan storage:link

> php artisan serve

