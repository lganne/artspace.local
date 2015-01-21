<?php
namespace service;
/**
 * Description of DiverService
 *
 * @author lganne
 */
class DiverService {
    
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    return $randomString;
    }
    
    function codepassword($motpasse)
    {
        $i=0;
        while($i<30)
        {
            $motpasse=  sha1($motpasse);
            $i++;
        }
        return $motpasse;
    }
}
