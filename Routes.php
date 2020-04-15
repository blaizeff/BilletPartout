<?php
//Redirected the page to a controller 
//and then create the view from the method View
Route::set('index.php',function() {
    HomeController::View('home');
});
Route::set('login',function() {
    ProfileController::View('login');
});


Route::set('profile/homepage',function() {
    ProfileController::View("homepage");
});

Route::set('profile/history',function() {
    ProfileController::View("history");
});


Route::set('cart/checkout',function() {
    CartController::View('checkout');
});



Route::set('show/details',function() {
    ShowController::View('details');
});
Route::set('show/event-info',function() {
    ShowController::View('eventInfo');
});
Route::set('show/list',function() {
    ShowController::View('list');
});


if(!in_array($_GET['url'],Route::$validRoute)) {
    InvalidPageController::View('InvalidPage');

    //!!! Pour Développement seulement !!! 
    echo ("Votre Url est: ".$_GET['url']."<br> Les URL valides sont: ");
    print_r(Route::$validRoute);
}
?>