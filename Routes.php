<?php
//Redirected the page to a controller 
//and then create the view from the method View
Route::set('index.php',function() {
    HomeController::View('home');
});

Route::set('profile/login',function() {
    ProfileController::LoginView('login');
});
Route::set('profile/homepage',function() {
    ProfileController::HomepageView("homepage");
});
Route::set('profile/SignUp',function() {
    ProfileController::SignUpView("SignUp");
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
    ShowController::ListView('list');
});

Route::set('admin/',function() {
    AdminController::IndexView("index");
});
Route::set('admin/add-show',function() {
    AdminController::AddView("addShow");
});
Route::set('admin/add-event',function() {
    AdminController::AddView("addEvent");
});

if(!in_array($_GET['url'],Route::$validRoute)) {
    InvalidPageController::View('InvalidPage');

    //!!! Pour Développement seulement !!! 
    echo ("Votre Url est: ".$_GET['url']."<br> Les URL valides sont: ");
    print_r(Route::$validRoute);
}
?>