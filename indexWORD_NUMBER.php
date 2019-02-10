<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link type="text/css" rel="stylesheet" href="css.css"/>
<head>
    <title>Game so thanh chu</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Game đoán số thành chữ</h1>
    <div id="value">
        <input type="text" name="number" placeholder="nhapso">
        <input type="submit" value="Convert">
    </div>
</form>
<?php
function convert_number_to_words($number)
{
    $list_number = array(
        "0" => "zero",
        "1" => "one",
        "2" => "two",
        "3" => "three",
        "4" => "four",
        "5" => "five",
        "6" => "six",
        "7" => "seven",
        "8" => "eight",
        "9" => "nine",
        "10" => "ten",
        "11" => "eleven",
        "12" => "twelve",
        "13" => "thirteen",
        "14" => "fourteen",
        "15" => "fifteen",
        "16" => "sixteen",
        "17" => "seventeen",
        "18" => "eighteen",
        "19" => "nineteen",
        "20" => "twenty",
        "30" => "thirsty",
        "40" => "fourty",
        "50" => "fifty",
        "60" => "sixty",
        "70" => "seventy",
        "80" => "eighty",
        "90" => "ninety",
        "100" => "hundred",
        "1000" => "thousand",
        "1000000" => "million",
        "1000000000" => "billion",
    );
    if ($number < 21) {
        return $list_number[$number];
    } else if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        $value = $list_number[$tens];
        if ($units) {
            return $value ." ". $list_number[$units];
        } else {
            return $list_number[$tens];
        }
    } else if ($number < 1000) {
        $hundred = floor($number / 100);
        $remainder = $number % 100;
        $value1 = $list_number[$hundred] ." ". $list_number["100"];
        if ($remainder) {
            return $value1 . " and " . convert_number_to_words($remainder);
        } else {
            return $value1;
        }
    } else if ($number < 1000000) {
        $thousand = floor($number / 1000);
        $remainder = $number % 1000;
//        $value2 = $list_number[$thousand] ." ". $list_number["1000"];
        $value2 = convert_number_to_words($thousand)." ".$list_number["1000"];
        if ($remainder) {
            return $value2 ." ". convert_number_to_words($remainder);
        } else {
            return $value2;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    echo convert_number_to_words($number);
}
?>
</body>
</html>