<?php
function get_musicprice($name)
{
    $products=[
        "music"=> 4,
        "bookingfee" => 5,
        "rockmusic" => 3,
        "hippop"=> 2,
    ];
    foreach($products as $product=>$price)
    {
        if($product==$name)
        {
            return $price;
            break;
        }
    }
}