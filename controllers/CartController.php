<?php

class CartController extends Controller {
    public static function checkoutView($page)
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ../profile/login?redirect=cart/checkout');
        }
        else if (isset($_SESSION['cart']['id']) && isset($_SESSION['cart']['sectionId']) && isset($_SESSION['cart']['nbTickets'])) {
            $ticket = new Ticket();
            $show = new Show();
            $data = [
                'nbTickets' => $_SESSION['cart']['nbTickets'],
                'price'=> $ticket->get($_SESSION['cart']['id'],$_SESSION['cart']['sectionId']),
                'section'=> $show->getSection($_SESSION['cart']['sectionId'])['name'],
                'eventName'=> $show->getEvent($_SESSION['cart']['id'])[0]['title'],
            ];    
            $data['subTotal'] = number_format($data['nbTickets'] * $data['price'],2);
            $data['TPS'] = number_format($data['subTotal'] * 0.05,2);
            $data['TVQ'] = number_format($data['subTotal'] * 0.09975,2);
            $data['total'] = number_format($data['subTotal'] + $data['TPS'] + $data['TVQ'],2);
            print_r($data);
            require_once("./views/cart/" . $page . ".php");
        } else {
        header('Location: ../show/list');
        }
    }
    public static function invoiceView($page)
    {
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $DB = new DB;
            $data = [
                "pidBillet" => $_SESSION['cart']['id'],
                "pidCLient" => $_SESSION['user']['idClient'],
                "nbBillet" => $_SESSION['cart']['nbTickets']
            ];
            $DB->callProcedure("insertAchat", $data);
        }
        
        require_once("./views/cart/" . $page . ".php");
    }

}
