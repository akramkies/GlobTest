<?php
  function bi_sort($arr){
    $min=0;
    $newArray = [];
    $k = 0;
    while(sizeof($arr) !== 0){
     for($i=1;$i < sizeof($arr) ; $i++){
         if($arr[$i][0] <= $arr[$min][0]){
              $min = $i;
         }
     }
     $newArray[$k] = $arr[$min];
     for($j = $min; $j < sizeof($arr)-1; $j++){
              $arr[$j] = $arr[$j+1];
     }
     unset($arr[sizeof($arr)-1]);
     $k++;
     $min = 0;
    }
    return $newArray;
  }
  function display($array){
     $res = "[";
     for($i=0; $i < sizeof($array) - 1;$i++){
         $res = $res." ".implode(",",$array[$i]).", ";
     }
     $res = $res."".implode(",",$array[sizeof($array)-1])."]";
     return $res;
  }

  function foo($array){
      $newArray = bi_sort($array);
      $i = 0;
      while($i < sizeof($newArray)-1){
          if($newArray[$i][1] >= $newArray[$i+1][0]){
                     if($newArray[$i][1] >= $newArray[$i+1][1]){  
                            $newArray[$i] = [$newArray[$i][0],$newArray[$i][1]];
                            for($j = $i+1; $j < sizeof($newArray)-1; $j++){
                                $newArray[$j] = $newArray[$j+1];
                            }
                            unset($newArray[sizeof($newArray)-1]);
                      }
                     else{
                           $newArray[$i] = [$newArray[$i][0],$newArray[$i+1][1]];
                           for($j = $i+1; $j < sizeof($newArray)-1; $j++){
                                $newArray[$j] = $newArray[$j+1];
                            }
                            unset($newArray[sizeof($newArray)-1]);
                      }
             $i--;
          }
          $i++;
      }
      return $newArray;
  }
  echo "-------------------------------------------------------------------------------------\n";
  echo "                      "."Appel"."                                        |      Sortie    |\n";
  echo "-------------------------------------------------------------------------------------\n";
  $res = display(foo([[0, 3], [6, 10]]));
  echo "foo([[0, 3], [6, 10]])                                             | ". $res."   |\n";
  echo "-------------------------------------------------------------------------------------\n";
  $res = display(foo([[0, 5], [3, 10]]));
  echo "foo([[0, 5], [3, 10]])                                             | ". $res."         |\n";
  echo "-------------------------------------------------------------------------------------\n";
  $res = display(foo([[0, 5], [2, 4]]));
  echo "foo([[0, 5], [2, 4]])                                              | ".$res."          |\n";
  echo "-------------------------------------------------------------------------------------\n";
  $res = display(foo([[7, 8], [3, 6], [2, 4]]));
  echo "foo([[7, 8], [3, 6], [2, 4]])                                      | ".$res."    |\n";
  echo "-------------------------------------------------------------------------------------\n";
  $res = display(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]));
  echo "foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]) | ". $res." |\n";
  echo "-------------------------------------------------------------------------------------\n";


?>
