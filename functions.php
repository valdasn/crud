<?php

function init(){
    session_start();
    if(!isset($_SESSION['list'])){
    $_SESSION['list'] = [];
    $_SESSION['id'] = 1;
    }
}

function store(){
    $person = [];
    $person['id'] = $_SESSION['id'];
    $person['name'] = $_POST['name'];
    $person['age'] = $_POST['age'];
    array_push($_SESSION['list'], $person);
    $_SESSION['id']++;
    header('location:./');
    die;
}

function update(){
    foreach($_SESSION['list'] as $key => &$person){
        if($person['id'] == $_POST['id']){
            $_SESSION['list'][$key]['name'] = $_POST['name'];
            $_SESSION['list'][$key]['age'] = $_POST['age'];
            header('location:./');
            die;
        }
    }
}

function destroy(){
    foreach($_SESSION['list'] as $key => &$person){
        if($person['id'] == $_POST['id']){
            unset($_SESSION['list'][$key]);
            header('location:./');
            die;
        }
    }
}

function find(){
    $person = [];
    foreach($_SESSION['list'] as $key => $entry){
        if($entry['id'] == $_GET['id']){
            $person = $entry;
            break;
        }
    }
    return $person;
}
















?>