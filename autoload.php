<?php
include 'functions/Sessao.class.php';
include 'templates/header.php';

spl_autoload_register(function($class){

    if(file_exists($class . '.php')){
        require_once $class . '.php';
    }
    if(file_exists($class . '.php')){
        require_once $class . '.php';
    }
    if(file_exists('functions/' . $class . '.class.php')){
        require_once 'functions/' . $class . '.class.php';
    }
    if(file_exists('models/' . $class . '.model.php')){
        require_once 'models/' . $class . '.model.php';
    }
});