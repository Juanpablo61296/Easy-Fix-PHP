<?php

function unique_names(array $array1, array $array2)
{
    $combinado=array_merge($array1, $array2);
    $arrayunico = array_unique($combinado);
    
    print_r($arrayunico);
       
}
$names = unique_names(['Ava', 'Emma', 'Olivia'], ['Olivia', 'Sophia', 'Emma']);
