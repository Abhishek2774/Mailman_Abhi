<?php 
class Validate{
    public static function required($value){
        if(strlen($value) == 0){
            return true;
        }else{
            return false;
        }
    }
public static function only_char_allow($value){
    $pattern = "/^[A-Za-z]+$/";
    if(!preg_match($pattern, $value)){
            return true;
    }else{
        return false;
    }
}

public static function username_check($value){
    $pattern = "^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$";
    if(!preg_match($pattern, $value)){
        return true;
}else{
    return false;
}

}

public static function is_specil_ch($value){
    if(preg_match("/([%\$#\*]+)/", $value)){
                return true;;
            }else{
                 return false;
             }

}
    public static function is_email($value){
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
        
    }
    public static function min_lenth($value){
        if(strlen($value) < 6){
            return true;
        }else{
            return false;
        }
    }

    public static function is_valid_password($value){
        $uppercase = preg_match('@[A-Z]@', $value);   // at least one upper case letter.
        $lowercase = preg_match('@[a-z]@', $value);   // at least one lower case letter.
        $number    = preg_match('@[0-9]@', $value);   // at least one number.
        $specialChars = preg_match('@[^\w]@', $value);  //at least one special character.

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($value) < 6) {
            return true;
        }else{
            return false;
        }

     }
     public static function ic_conf_pass($vpass,$cpass){
        if( $vpass !== $cpass ){
            return true;
        }else{
            return false;
        }
     }

public static function is_profile($image){
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $all_img_ext = array(
        "png",
        "jpg",
    );
        if(! in_array($file_extension,$all_img_ext) || $_FILES["image"]["size"] > 2000000){
        return true;
        }else{
            return false;
        }
    }


}
?>