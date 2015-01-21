<?php

namespace service;

class Config {

    protected static $path;

    public static function url($path = '', $params) /* ...$params) */ 
    {
        $p = '';
        $nbParams = func_num_args();

        for ($i = 1; $i < $nbParams; $i++) {
            $p.="/" . func_get_arg($i);
        }
        $p = rtrim($p, '/');
        if (empty($path)) {
            return URI;
        } else {
            return URI . '/' . $path . $p;
        }
    }

    public static function slugy($slug, $params) {
        $rules = [ // Numeric characters
            '¹' => 1,
            '²' => 2,
            '³' => 3,
            // Latin
            '°' => 0,
            'æ' => 'ae',
            'ǽ' => 'ae',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Å' => 'A',
            'Ǻ' => 'A',
            'Ă' => 'A',
            'Ǎ' => 'A',
            'Æ' => 'AE',
            'Ǽ' => 'AE',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'å' => 'a',
            'ǻ' => 'a',
            'ă' => 'a',
            'ǎ' => 'a',
            'ª' => 'a',
            '@' => 'at',
            'Ĉ' => 'C',
            'Ċ' => 'C',
            'ĉ' => 'c',
            'ċ' => 'c',
            '©' => 'c',
            'Ð' => 'Dj',
            'Đ' => 'Dj',
            'ð' => 'dj',
            'đ' => 'dj',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ĕ' => 'E',
            'Ė' => 'E',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ĕ' => 'e',
            'ė' => 'e',
            'ƒ' => 'f',
            'Ĝ' => 'G',
            'Ġ' => 'G',
            'ĝ' => 'g',
            'ġ' => 'g',
            'Ĥ' => 'H',
            'Ħ' => 'H',
            'ĥ' => 'h',
            'ħ' => 'h',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ĩ' => 'I',
            'Ĭ' => 'I',
            'Ǐ' => 'I',
            'Į' => 'I',
            'Ĳ' => 'IJ',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ĩ' => 'i',
            'ĭ' => 'i',
            'ǐ' => 'i',
            'į' => 'i',
            'ĳ' => 'ij',
            'Ĵ' => 'J',
            'ĵ' => 'j',
            'Ĺ' => 'L',
            'Ľ' => 'L',
            'Ŀ' => 'L',
            'ĺ' => 'l',
            'ľ' => 'l',
            'ŀ' => 'l',
            'Ñ' => 'N',
            'ñ' => 'n',
            'ŉ' => 'n',
            'Ò' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ō' => 'O',
            'Ŏ' => 'O',
            'Ǒ' => 'O',
            'Ő' => 'O',
            'Ơ' => 'O',
            'Ø' => 'O',
            'Ǿ' => 'O',
            'Œ' => 'OE',
            'ò' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ō' => 'o',
            'ŏ' => 'o',
            'ǒ' => 'o',
            'ő' => 'o',
            'ơ' => 'o',
            'ø' => 'o',
            'ǿ' => 'o',
            'º' => 'o',
            'œ' => 'oe',
            'Ŕ' => 'R',
            'Ŗ' => 'R',
            'ŕ' => 'r',
            'ŗ' => 'r',
            'Ŝ' => 'S',
            'Ș' => 'S',
            'ŝ' => 's',
            'ș' => 's',
            'ſ' => 's',
            'Ţ' => 'T',
            'Ț' => 'T',
            'Ŧ' => 'T',
            'Þ' => 'TH',
            'ţ' => 't',
            'ț' => 't',
            'ŧ' => 't',
            'þ' => 'th',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ũ' => 'U',
            'Ŭ' => 'U',
            'Ű' => 'U',
            'Ų' => 'U',
            'Ư' => 'U',
            'Ǔ' => 'U',
            'Ǖ' => 'U',
            'Ǘ' => 'U',
            'Ǚ' => 'U',
            'Ǜ' => 'U',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ũ' => 'u',
            'ŭ' => 'u',
            'ű' => 'u',
            'ų' => 'u',
            'ư' => 'u',
            'ǔ' => 'u',
            'ǖ' => 'u',
            'ǘ' => 'u',
            'ǚ' => 'u',
            'ǜ' => 'u',
            'Ŵ' => 'W',
            'ŵ' => 'w',
            'Ý' => 'Y',
            'Ÿ' => 'Y',
            'Ŷ' => 'Y',
            'ý' => 'y',
            'ÿ' => 'y',
            'ŷ' => 'y',];

        $s = preg_replace('/ /', '_', strtr($slug, $rules));

        $p = '';
        $nbParams = func_num_args();

        for ($i = 1; $i < $nbParams; $i++) {
            $p.="/" . func_get_arg($i);
        }
        $p = rtrim($p, '/');

        return URI . '/' . $s . $p;
    }

}
