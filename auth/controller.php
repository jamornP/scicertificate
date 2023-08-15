<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/scicertificate/function/function.php");
require_once($_SERVER['DOCUMENT_ROOT']."/scicertificate/vendor/autoload.php");
require_once($_SERVER['DOCUMENT_ROOT'].'/scicertificate/google-api/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/scicertificate/auth/config.php');


// use App\Model\Repair\Users;
// $usersObj = new Users;
if(isset($_GET["code"])){
    $toke = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);

}else{
    header('location: login.php');
    exit();
}

if(isset($toke["error"]) != "invalid_grant"){
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    $_SESSION['login_certificate'] = true;
    $_SESSION['name'] = $userData['name'];
    $_SESSION['email'] = $userData['email'];
    $_SESSION['img'] = $userData['picture'];
    echo "  
             <script type='text/javascript'>
                 setTimeout(function(){location.href='/scicertificate/backend/pages'} , 0);
             </script>
         ";
    //  echo $userData['email'];
    // $data['email']=$userData['email'];
    // $data['picture']=$userData['picture'];

    // $ck = $usersObj->checkUserGoogle($data,$userData['picture']);

    // if($ck){
    //     echo "  
    //         <script type='text/javascript'>
    //             setTimeout(function(){location.href='/scicertificate/backend/pages'} , 0);
    //         </script>
    //     ";
    // }else{
    //     echo "  
    //         <script type='text/javascript'>
    //             setTimeout(function(){location.href='/scicertificate/auth/login.php'} , 0);
    //         </script>
    //     ";
    // }
    // echo "<pre>";
    // var_dump($userData);
    // echo "</pre>";
}else{
    header('Location: /scicertificate/auth/login.php');
    exit();
}

?>