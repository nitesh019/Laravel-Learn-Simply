<?php
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


    function hello(){
        echo "hello from Helper function";
        die;
    }

    function dateFormatHelper($date, $pattern){
        $dateobj = date_create($date);
        return date_format($dateobj,$pattern);
    }

    function trimStringHelper($str,$num){
        return substr($str, 0, $num).'.......';
    }

    function dateFormat($date,$format){
        return Carbon::createFromFormat('Y-m-d',$date)->format($format);
    }


    function trimString($string,$repl,$limit){
        if(strlen($string)> $limit){
            return substr($string,0,$limit).$repl;
        }
        else{
            return $string;
        }
    }


    function truncate($string,$length){
        if(strlen($string)> $length){
            return substr($string,0,$length-3).'...';
        }

        return $string;
    }


?>
