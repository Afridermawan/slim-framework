<?php 

$app->get('/', 'App\Controllers\ArticleController:index')->setName('articles');
$app->get('/articles', 'App\Controllers\ArticleController:articles')->setName('articles');