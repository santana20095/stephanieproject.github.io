<?php
// require_once '../Core/Database.php';
// require_once '../src/Controller/UserController.php';
// require_once '../src/Repository/UserRepository.php';

$url = '';

if(isset($_GET['url'])){
    $url = explode('/',$_GET['url']);
}
if($url === ''){
    require_once '../templates/home.php';
}elseif ($url[0] === 'home') {
    
    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'home'){

    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'service'){

    require_once '../templates/' . $url[0] . '.php';
}

elseif($url[0] === 'blog'){

    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'enfant'){

    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'adulte'){

    require_once '../templates/' . $url[0] . '.php';
}
elseif($url[0] === 'tests'){

    require_once '../templates/' . $url[0] . '.php';
}

elseif($url[0] === 'register'){

    require_once '../templates/' . $url[0] . '.php';

}elseif($url[0] === 'login'){
    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'contact'){
}elseif($url[0] === 'logout'){
    require_once '../templates/' . $url[0] . '.php';
}elseif($url[0] === 'contact'){
    require_once '../templates/' . $url[0] . '.php';
}
