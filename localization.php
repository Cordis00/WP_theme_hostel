<?php

function localiz($key)
{
    $lang = $_SESSION['lang'];
    $strings = include 'lang/' . $lang . '.php';
    if(array_key_exists($key, $strings))
    {
        echo $strings[$key];
    }
    else
    {
        echo $key;
    }
}
