<?php

return [
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
    'news/([0-9]+)' => 'news/tagnews/$1',
    'news/([a-z]+)/page-([0-9]+)' => 'news/category/$1/$2',
    'news/([a-z]+)' => 'news/category/$1',
    //Коментарии
    'comments/([0-9]+)' => 'comments/view/$1',
    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    // Управление новостями:
    'admin/news/create' => 'adminNews/create',
    'admin/news/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news' => 'adminNews/index',
    // Управление категориями:
    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',
    // Управление коментариями:
    'admin/comments/create' => 'adminComments/create',
    'admin/comments/update/([0-9]+)' => 'adminComments/update/$1',
    'admin/comments/delete/([0-9]+)' => 'adminComments/delete/$1',
    'admin/comments' => 'adminComments/index',
    // Админпанель:
    'admin' => 'admin/index',
    //Главная страница
    '' => 'site/index',
];
