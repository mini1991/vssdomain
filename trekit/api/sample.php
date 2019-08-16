<?php
$myObj->name = "VEGGIE CHIPS";
$myObj->expirydate = "12/12/2019";
$myObj->health = "Moderate";
$myObj->status = "Good";

$myObj->url = "John";
$myObj->content = "Deep Fries vegitable chips";
$myObj->nutrition = "fat,vitamins";
$myObj->ingredients = "Beans,Potato,corn,green peper,tomato,chili";
$myObj->allergens = "vegetable and spices";

$myJSON = json_encode($myObj);

echo $myJSON;
?>