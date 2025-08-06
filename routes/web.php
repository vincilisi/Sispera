<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/about', function(){
    $users = [
        ['name'=>'Vincenzo', 'surname'=>'Lisitano', 'role'=>'CEO'],
        ['name'=>'Fatima', 'surname'=>'Essalhi', 'role'=>'Grafic Designer'],
        ['name'=>'Luca', 'surname'=>'Salcol', 'role'=>'Senior Developer'],
    ];
    return view('about-us', ['users'=>$users]);
})->name('aboutUs');

Route::get('/about/detail/{name}', function($name){
     $users = [
        ['name'=>'Vincenzo', 'surname'=>'Lisitano', 'role'=>'CEO'],
        ['name'=>'Fatima', 'surname'=>'Essalhi', 'role'=>'Grafic Designer'],
        ['name'=>'Luca', 'surname'=>'Salcol', 'role'=>'Senior Developer'],
    ];
    foreach($users as $user){
        if($name == $user['name']){
            return view('about-us-detail', ['user' =>$user]);
        }
    }
})->name('aboutUsDetail');


Route::get('/contact', function(){
    return view('contacts');
})->name('contats');



Route::get('/movies', function(){
    $movies = [
        ['id'=>1, 'title'=>'The Conjuring', 'director'=>'James Wan', 'img'=>'/media/The_Conjuring_poster.jpg', 'geners'=>'Horror'],
        ['id'=>2, 'title'=>"L'amore non va in vacanza", 'director'=>'Nancy Meyers', 'img'=>"/media/L'amore_non_va_in_vacanza.jpg", 'geners'=>'Romantico'],
        ['id'=>3, 'title'=>"Raya e l'ultimo drago", 'director'=>'D.Hall,C.L.Estrada', 'img'=>'media/RayaMovie.png', 'geners'=>'Animazione'],
        ['id'=>4, 'title'=>'Inception', 'director'=>'Christopher Nolan', 'img'=>'/media/Inception.jpg', 'geners'=>'Thriller'],
        ['id'=>5, 'title'=>'In vacanza su Marte', 'director'=>'Neri Parenti', 'img'=>'media/In_vacanza_su_Marte.png', 'geners'=>'Comico'],
    ];
    return view('movie.movies', ['movies'=>$movies]);
})->name('movie-list');

Route::get('/movies/detail/{id}',function($id){
    $movies = [
        ['id'=>1, 'title'=>'The Conjuring', 'director'=>'James Wan', 'img'=>'/media/The_Conjuring_poster.jpg', 'geners'=>'Horror'],
        ['id'=>2, 'title'=>"L'amore non va in vacanza", 'director'=>'Nancy Meyers', 'img'=>"/media/L'amore_non_va_in_vacanza.jpg", 'geners'=>'Romantico'],
        ['id'=>3, 'title'=>"Raya e l'ultimo drago", 'director'=>'D.Hall,C.L.Estrada', 'img'=>'media/RayaMovie.png', 'geners'=>'Animazione'],
        ['id'=>4, 'title'=>'Inception', 'director'=>'Christopher Nolan', 'img'=>'/media/Inception.jpg', 'geners'=>'Thriller'],
        ['id'=>5, 'title'=>'In vacanza su Marte', 'director'=>'Neri Parenti', 'img'=>'media/In_vacanza_su_Marte.png', 'geners'=>'Comico'],
    ];
    foreach($movies as $movie){
        if($id == $movie['id']){
            return view('movie.movie-detail', ['movie'=>$movie]);
        }
    }
})->name('movie.datail');