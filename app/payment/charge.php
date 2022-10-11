<?php

namespace App\Payment;

require_once('../vendor/autoload.php');
require_once('../config/config.php');
require_once('../lib/pdo_db.php');
require_once('../models/Customer.php');
require_once('../models/Transaction.php');

\Stripe\Stripe::setApiKey('sk_test_rbi32VScQ70jE2s8oQoRMUQD');

// Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$price = $POST['eve_price'];
$events = $POST['eve_title'];
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$phone = $POST['phone'];
$address = $POST['address'];
$ticket = $POST['ticket'];
$token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
            "email" => $email,
            "source" => $token
        ));

// Charge Customer
$charge = \Stripe\Charge::create(array(
            "amount" => $price * $ticket,
            "currency" => "usd",
            "description" => "$events",
            "customer" => $customer->id
        ));

// Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'phone' => $phone,
    'address' => $address
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'ticket' => $ticket,
    'status' => $charge->status
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: ../success.php?tid=' . $charge->id . '&product=' . $charge->description . '&cname=' . $first_name . ' ' . $last_name);
