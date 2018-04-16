<html>
<center>
<h1> Simple Hemograph Encrypter </h1>
<form method="post">
<textarea cols=50 rows=10 name="str" placeholder="">
</textarea><br>
<input type="submit" value="Encrypt">
</form>

<?php

// Simple Hemograph Encrypter
// Versailles
// Adopt from Python Version ( https://github.com/fadyosman/homograph-it/blob/master/homographit.py )


function replacer($s)
{
    
    $chars = array(
        "A" => "\u0391",
        "B" => "\u0392",
        "C" => "\u0421",
        "E" => "\u0395",
        "H" => "\u0397",
        "J" => "\u0408",
        "K" => "\u039A",
        "M" => "\u039C",
        "N" => "\u039D",
        "O" => "\u039F",
        "P" => "\u03A1",
        "S" => "\u0405",
        "T" => "\u03A4",
        "X" => "\u03A7",
        "Y" => "\u03A5",
        "a" => "\u0430",
        "b" => "\u042C",
        "c" => "\u0441",
        "e" => "\u0435",
        "i" => "\u0456",
        "j" => "\u0458",
        "k" => "\u03BA",
        "o" => "\u03BF",
        "p" => "\u03C1",
        "r" => "\u0433",
        "s" => "\u0455",
        "v" => "\u03BD",
        "x" => "\u03C7",
        "y" => "\u0443"
    );
    
    return json_decode('"' . str_replace(array_keys($chars), $chars, $s) . '"', true);
}

function encrypt($str)
{
    $res = preg_replace_callback("/(?<=>)([^>]+)(?=<)/", function($matches)
    {
        $txt = replacer($matches[1]);
        return $txt;
    }, $str);
    return $res;
}


if (isset($_POST['str'])) {
    echo "<textarea cols=50 rows=10 placeholder='result'>" . encrypt($_POST['str']) . "</textarea>";
}

?>
</html>
