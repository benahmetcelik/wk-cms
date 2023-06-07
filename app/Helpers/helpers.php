<?php

function user()
{
    return auth()->user();
}
function usernameMaker($first_name,$last_name,$separator='.',$numbers=false,$numbers_length=4,){
    $username = strtolower($first_name.$separator.$last_name);
    if($numbers){
        for ($i=0; $i < $numbers_length; $i++){
            $username .= $separator.random_int(0,9);
        }
    }
    return latinChars($username);
}

function latinChars($word){
    $tr_chars = [
      'ş'=>'s',
        'Ş'=>'S',
        'ı'=>'i',
        'İ'=>'I',
        'ğ'=>'g',
        'Ğ'=>'G',
        'ö'=>'o',
        'Ö'=>'O',
        'ü'=>'u',
        'Ü'=>'U',
        'ç'=>'c',
        'Ç'=>'C'

    ];
    foreach ($tr_chars as $key => $value) {
        $word = str_replace($key,$value,$word);
    }

    return $word;
}

function getAvatar($user){
    if($user->avatar){
        return $user->avatar;
    }else{
        return 'https://ui-avatars.com/api/?name='.$user->first_name.'+'.$user->last_name.'&color=7F9CF5&background=EBF4FF';
    }
}
