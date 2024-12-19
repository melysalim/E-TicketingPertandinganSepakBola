// app/Helpers/CustomValidation.php
<?php

if (! function_exists('valid_time')) {
function valid_time($str)
{
// Memeriksa format waktu: HH:MM (format 24 jam)
return preg_match('/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/', $str);
}
}