<?php

namespace App\Payment;

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}

use APP\Payment\PaymentDatabase;
use Config\Connection;
use App\Payment\Customer;
use App\Payment\Transaction;

// print_r($_POST);
// if (isset($_POST['nm_make_payment'])) {
// $price = htmlspecialchars($_POST['eve_price']);
// $events = htmlspecialchars($_POST['eve_title']);
// $first_name = htmlspecialchars($_POST['first_name']);
// $last_name = htmlspecialchars($_POST['last_name']);
// $email = htmlspecialchars($_POST['email']);
// $phone = htmlspecialchars($_POST['phone']);
// $address = htmlspecialchars($_POST['address']);
// $ticket = htmlspecialchars($_POST['ticket']);
// $token = htmlspecialchars($_POST['stripeToken']);


// $userDatas = [$price, $events];

// // echo $token;
// // echo "test";

// $post = array_map('htmlspecialchars', $_POST);
// $make_payment = new Charge($_POST);


array_walk_recursive($_POST, function(&$val){
    $valu = htmlspecialchars($val);

    echo $valu;
});

// $f_name = htmlspecialchars($_POST['first_name']);

// echo '<pre>';
// print_r($post);

// print_r($f_name);

// $make_payment->set_user_info($price,$events,$first_name,$last_name,$email,$phone,$address,$ticket,$token);

// echo $make_payment->get_user_info();

// echo "test";

//exit;

// }

class Charge
{

    protected $price, $events, $first_name, $last_name, $email, $phone, $address, $ticket, $token;

    // protected $userData = [$key=>$val];


    public function __construct($userData)
    {
        \Stripe\Stripe::setApiKey('sk_test_rbi32VScQ70jE2s8oQoRMUQD');

        // array_walk_recursive($userData, function(&$val){
        //     htmlspecialchars($val);
        // });

        //$userData = array_map('htmlspecialchars', $userDatas);

        // foreach ($userDatas as $key => $val) {
        //     $userDatas[$key] = $this->userData[$key];
        //     $userDatas[$val] = $this->userData[$val];
        // }

        // $this->price = $userData['eve_price'];
        // $this->events = $userData['eve_title'];
        $this->first_name = $userData['first_name'];
        // $this->last_name = $userData['last_name'];
        // $this->email = $userData['email'];
        // $this->phone = $userData['phone'];
        // $this->address = $userData['address'];
        // $this->ticket = $userData['ticket'];
        // $this->token = $userData['stripeToken'];

        return $this->first_name;
    }

    public function set_user_info($price, $events, $first_name, $last_name, $email, $phone, $address, $ticket, $token)
    {
        $this->price = $price;
        $this->events = $events;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->ticket = $ticket;
        $this->token = $token;
    }

    public function get_user_info()
    {
        return $this->first_name;
    }
}

// require_once('../vendor/autoload.php');
// require_once('../config/config.php');
// require_once('../lib/pdo_db.php');
// require_once('../models/Customer.php');
// require_once('../models/Transaction.php');



// Sanitize POST Array
// $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);



// Create Customer In Stripe
// $customer = \Stripe\Customer::create(array(
//             "email" => $email,
//             "source" => $token
//         ));

// // Charge Customer
// $charge = \Stripe\Charge::create(array(
//             "amount" => $price * $ticket,
//             "currency" => "usd",
//             "description" => "$events",
//             "customer" => $customer->id
//         ));

// // Customer Data
// $customerData = [
//     'id' => $charge->customer,
//     'first_name' => $first_name,
//     'last_name' => $last_name,
//     'email' => $email,
//     'phone' => $phone,
//     'address' => $address
// ];

// // Instantiate Customer
// $customer = new Customer();

// // Add Customer To DB
// $customer->addCustomer($customerData);


// // Transaction Data
// $transactionData = [
//     'id' => $charge->id,
//     'customer_id' => $charge->customer,
//     'product' => $charge->description,
//     'amount' => $charge->amount,
//     'currency' => $charge->currency,
//     'ticket' => $ticket,
//     'status' => $charge->status
// ];

// // Instantiate Transaction
// $transaction = new Transaction();

// // Add Transaction To DB
// $transaction->addTransaction($transactionData);

// // Redirect to success
// header('Location: ../success.php?tid=' . $charge->id . '&product=' . $charge->description . '&cname=' . $first_name . ' ' . $last_name);
