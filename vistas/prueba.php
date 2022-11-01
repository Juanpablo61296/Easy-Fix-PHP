<?php
/**
 * @return array An array of two elements containing roots in any order
 */
function findRoots($a, $b, $c)
{
   
    $resultados = [ ];
    $uno = pow($b, 2) -(4*$a*$c);
    $suma = (-$b) + sqrt($uno);
    $resta = (-$b) - sqrt($uno);
    $resultados[0] = $suma / (2*$a);
    $resultados[1] = $resta / (2*$a);

    if ($resultados[0] == $resultados[1]) {
        echo "$resultados[0]";
    }else{
    echo "$resultados[0], $resultados[1]";}*/

    function unique_names(array $array1=['Ava', 'Emma', 'Olivia'], array $array2) : array
{
    $tam = array1.log();
    $tam2 = array2.log();
    echo "tam2";
    
    return [];
}


}

