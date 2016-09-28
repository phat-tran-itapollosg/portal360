<?php

    /*
    *   Class AlphaUtil
    *   Auhor: Pong Pi (Eroshaly@gmail.com)
    */

    class AlphaUtil {
        


        static function create_guid()
        {
            $microTime = microtime();
            list($a_dec, $a_sec) = explode(" ", $microTime);

            $dec_hex = dechex($a_dec* 1000000);
            $sec_hex = dechex($a_sec);

            self::ensure_length($dec_hex, 5);
            self::ensure_length($sec_hex, 6);

            $guid = "";
            $guid .= $dec_hex;
            $guid .= self::create_guid_section(3);
            $guid .= '-';
            $guid .= self::create_guid_section(4);
            $guid .= '-';
            $guid .= self::create_guid_section(4);
            $guid .= '-';
            $guid .= self::create_guid_section(4);
            $guid .= '-';
            $guid .= $sec_hex;
            $guid .= self::create_guid_section(6);

            return $guid;

        }

        static function create_guid_section($characters)
        {
            $return = "";
            for($i=0; $i<$characters; $i++)
            {
                $return .= dechex(mt_rand(0,15));
            }
            return $return;
        }
        static function ensure_length(&$string, $length)
        {
            $strlen = strlen($string);
            if($strlen < $length)
            {
                $string = str_pad($string,$length,"0");
            }
            else if($strlen > $length)
            {
                $string = substr($string, 0, $length);
            }
        }
    }
?>
