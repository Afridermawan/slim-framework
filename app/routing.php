<?php 

$app->get('/', 'App\Controllers\ArticleController:showById');
$app->get('/articles', 'App\Controllers\ArticleController:articles')->setName('articles');
$app->get('/articles/add', 'App\Controllers\ArticleController:getAdd')->setName('articles.add');
$app->get('/articles/del/{id}', 'App\Controllers\ArticleController:softDelete');
$app->post('/articles/add', 'App\Controllers\ArticleController:add');
