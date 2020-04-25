@extends('layouts.app')

@section('content')
  <h1>Congratulation</h1>
  <p>Your app is ready</p>
  <p>In order to install your app successfully. Follow the following process:-</p>
  <ul>
    <li>Composer install</li>
    <li>composer require laravel/passport</li>
    <li>composer require intervention/image</li>
    <li>php artisan key:generate</li>
    <li>create database and update database name in .env file</li>
    <li>add mailtrap username and password for mail testing during development process</li>
    <li>php artisan notifications:table</li>
    <li>php artisan queue:table</li>
    <li>php artisan migrate</li>
    <li>php artisan db:seed   //for inserting fake data to database</li>
    <li>php artisan passport:install</li>
    <li>npm install</li>
    <li>npm install vue vue-router</li>
    <li>Copy lab.js content to app.js in resources/js directory</li>
    <li>import npm modules for selected frontend or add stylesheet and javascript from cdn to layouts.app and restapi.blade.php in resources/views directory</li>
    <li>npm run dev</li>
    <li>your app is ready now</li>
    <li>check /restapi for single page application</li>
    <li>you may need to customize few things as per your needs</li>
  </ul>

  <h2>Want to say Thanks</h2>
  <p>
    Like our facebook page <a href="http://www.facebook.com/laravelappbuilder">Facebook</a>
    <br>
    Join our facebook page community <a href="https://www.facebook.com/groups/244081846783991/">Facebook Community</a>
    <br>
    Like and subscribe our youtube channel <a href="https://www.youtube.com/channel/UCrFpwd7DkftFMfQDudhzTGA">Youtube Channel</a>
    <br>
    <br>
  </p>
@endsection
