<?php
declare(strict_types=1);
function FindNegative(array $NumbersArray) : true
{
    $StringToPrint = "<h1>";
    for($i = 0; $i < sizeof($NumbersArray); $i++) {
        if($NumbersArray[$i]>=0)
        {
            $StringToPrint .=  $NumbersArray[$i] . "\t";
        }
        else
        {
            $StringToPrint .=  '<span style = "color: red">' . $NumbersArray[$i] . '</span>'. "\t";
        }

    }
    $StringToPrint .="</h2>";
    echo $StringToPrint;
    return true;
}
function ConversionFromNumberToString(int $number) : string
{
    $StringToPrint= "";
    if(intval($number)/1000!=0)
    {
        $thousands = intval($number/1000);
        $StringToPrint .= match ($thousands)
        {
            0=>"",
            1=> "one thousand, ",
            2=>"two thousand, ",
            3=>"three thousand, ",
            4=>"four thousand, ",
            5=>"five thousand, ",
            6=>"six thousand, ",
            7=>"seven thousand, ",
            8=>"eighth thousand, ",
            9=>"nine thousand, ",
            default=> 'untitled'
        };
    }
    if($number/100!=0)
    {
        $hundreds = (intval($number/100))%10;

                $StringToPrint .= match ($hundreds) {
                    0 => "",
                    1 => "one hundred",
                    2 => "two hundred",
                    3 => "three hundred",
                    4 => "four hundred",
                    5 => "five hundred",
                    6 => "six hundred",
                    7 => "seven hundred",
                    8 => "eighth hundred",
                    9 => "nine hundred",
                    default=> 'untitled'
                };


    }
        $tens = intval(($number%100)/10);
        if($tens==1)
        {
            $tensAndUnit = intval($number%100);
            $StringToPrint .= match ($tensAndUnit) {
                0 => ".",
                10 => " and ten.",
                11 => " and eleven.",
                12 => " and twelve.",
                13 => " and thirteen.",
                14 => " and fourteen.",
                15 => " and fifteen.",
                16 => " and sixteen.",
                17 => " and seventeen.",
                18 => " and eighteen.",
                19 => " and nineteen.",
                default => 'untitled'
            };
        }
        else {
            $StringToPrint .= match ($tens) {
                0=>"",
                2 => " and twenty",
                3 => " and thirty",
                4 => " and forty",
                5 => " and fifty",
                6 => " and sixty",
                7 => " and seventy",
                8 => " and eighty",
                9 => " and ninety",
                default => 'untitled'
            };
            $unit = $number%10;
            $StringToPrint .= match ($unit) {
                0 => ".",
                1 => " one.",
                2 => " two.",
                3 => " three.",
                4 => " four.",
                5 => " five.",
                6 => " six.",
                7 => " seven.",
                8 => " eight.",
                9 => " nine.",
                default => 'untitled'
            };

        }

    return $StringToPrint;
}


function PrintRandDiv(int $number)
{
    if($number!=0)
    {
        $toprand = rand(200, 350);
        $leftrand = rand(0, 150);
        echo "<div style='
    position: absolute;
    width: 20px;
    height: 20px;
    background-color: lightpink;
    top: {$toprand}px;
    left: {$leftrand}px;'></div>";
        $number--;
        PrintRandDiv($number);
    }
}

function DisplayProduct(string $name, float $price, string $image)
{
    echo "
    <div style='float: left; border: 1px solid pink'>
    <img src='{$image}' style='height: 250px;'>
    <h3>{$name}</h3>
    <p>{$price}₴</p>
    <button type='submit' style='background-color: lightpink; color: black; width: 160px; height: 30px; margin: 20px;'>Додати в корзину</button>

    </div>
    ";
}

function DisplayProductsCart(array $allproducts)
{
    echo "<div style='height: 250px; width: 700px;'>";
    for($i = 0; $i < sizeof($allproducts); $i++)
    {
        echo "
    <div style='float: left; border: 1px solid pink'>
    <img src='{$allproducts[$i]['image']}' style='height: 250px;'>
    <h3>{$allproducts[$i]['name']}</h3>
    <p>Кількість: {$allproducts[$i]['count']}</p>
    <p>Загальна вартість: {$allproducts[$i]['total_price']}₴</p>
    </div>
    ";
    }
    echo "</div>";
}

echo "Функція для знаходження від'ємних чисел і виводу їх червоним:";
$arrayOfNumbers = [5,10,-6,9,-3,0,11,25];
FindNegative($arrayOfNumbers);

$number = 6710;
echo $number . ": " . ConversionFromNumberToString($number);
echo "<br>10 рандомних div:";
echo "<div style='height: 250px; width: 150px;'>";
PrintRandDiv(10);
echo "</div>";
echo "<br>";
DisplayProduct("iPhone 15 128Gb Black", 36999, "https://scdn.comfy.ua/89fc351a-22e7-41ee-8321-f8a9356ca351/https://cdn.comfy.ua/media/catalog/product/i/p/iphone_15_black_pdp_image_position-1__ww-en_1__2.jpg/w_600");
DisplayProduct("OPPO Reno10 256Gb Blue", 16999, "https://scdn.comfy.ua/89fc351a-22e7-41ee-8321-f8a9356ca351/https://cdn.comfy.ua/media/catalog/product/c/h/chanel__product_images_ice_blue____back-rgb_2_.jpg/w_600");
DisplayProduct("Xiaomi Redmi 13C 256Gb", 5999, "https://elektron.com.ua/4227-thickbox_default/xiaomi-redmi-13c-8256gb-midnight-black.jpg");

$allproducts=array
(
    array('name' =>"iPhone 15 128Gb Black", 'image'=>"https://scdn.comfy.ua/89fc351a-22e7-41ee-8321-f8a9356ca351/https://cdn.comfy.ua/media/catalog/product/i/p/iphone_15_black_pdp_image_position-1__ww-en_1__2.jpg/w_600", 'count'=>2, 'total_price'=>73998),
    array('name' =>"Xiaomi Redmi 13C 256Gb", 'image'=>"https://elektron.com.ua/4227-thickbox_default/xiaomi-redmi-13c-8256gb-midnight-black.jpg", 'count'=>5, 'total_price'=>29995),
);
DisplayProductsCart($allproducts);