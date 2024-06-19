<?php
session_start();
$password = "MonMdp2024";
$password2 = "MonMdp2024";

$md5 = hash('md5',$password)   ;     //la fonction hash est native a php , md5 algo de cryptage 
$md52 = hash('md5',$password2)   ;     //la fonction hash est native a php , md5 algo de cryptage 

echo $md5."<br>";
echo $md52."<br>";


$password = "MonMdp2024";
$password2 = "MonMdp2024";
echo"<br>";
$sha256 = hash('sha256',$password)   ;     //la fonction hash est native a php , sha256 algo de cryptage 
$sha256_2 = hash('sha256',$password2)   ;     //la fonction hash est native a php , sha256 algo de cryptage 

echo $sha256."<br>";
echo $sha256_2."<br>";
echo"<br>";

//algorythme de hachage Fort 
$hash = password_hash($password, PASSWORD_DEFAULT);
$hash2 = password_hash($password, PASSWORD_DEFAULT);
echo $hash."<br>";
echo $hash2."<br>";


//saisie dans le formulaire de login 
$saisie = "MonMdp2024";
$check = password_verify($saisie,$hash);

$user = "Chaima ";
// pour se connecter 
if(password_verify($saisie,$hash)){
    // echo "les mots de passent correspondent !";
    $_SESSION["user"]= $user;
    echo $user."est connecté !";
}else{
    echo "les mots de passe sont différents !";
}






