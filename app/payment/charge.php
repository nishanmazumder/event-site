<?php

namespace App\Payment;

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}


/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Load all essential classes
|
*/

use App\Payment\Customer;
use App\Payment\Transaction;

/*
|--------------------------------------------------------------------------
| Initiate
|--------------------------------------------------------------------------
|
| trigger class with data
|
*/
$make_payment = new Charge($_POST);

class Charge
{
    protected $price, $events, $first_name, $last_name, $email, $phone, $address, $ticket, $token;
    protected $userData = [];
    protected $customer;
    protected $charge;
    protected $customerData;
    protected $transactionData;

    public function __construct(&$userData)
    {
        \Stripe\Stripe::setApiKey('sk_test_rbi32VScQ70jE2s8oQoRMUQD');

        // Get User data
        $this->userData = $userData;

        // Init Charge
        $this->init();

        // Redirect to success
        header('Location:'.BASE_URL.'public/web/success.php?tid=' . $this->charge->id . '&product=' . $this->charge->description . '&cname=' . $this->first_name . ' ' . $this->last_name);
    }

    public function init()
    {
        //Sanitize POST Data
        $this->user_data_sanitize($this->userData);

        //Define user datas
        $this->userData();

        // Create Customer In Stripe
        $this->customerCreate();

        // Charge Customer
        $this->customerCharge();

        // Create Customer Data
        $this->CreateCustomerData();

        // Transaction Data
        $this->customerTransection();
    }

    //Sanitize POST Data
    public function user_data_sanitize($userData)
    {
        array_walk_recursive($userData, function (&$val) {
            return htmlspecialchars($val);
        });
    }

    //Define user data
    public function userData()
    {
        $this->price = $this->userData['eve_price'];
        $this->events = $this->userData['eve_title'];
        $this->first_name = $this->userData['first_name'];
        $this->last_name = $this->userData['last_name'];
        $this->email = $this->userData['email'];
        $this->phone = $this->userData['phone'];
        $this->address = $this->userData['address'];
        $this->ticket = $this->userData['ticket'];
        $this->token = $this->userData['stripeToken'];
    }

    // Create Customer In Stripe
    public function customerCreate()
    {
        $this->customer = \Stripe\Customer::create(array(
            "email" => $this->email,
            "source" => $this->token
        ));
    }

    // Charge Customer
    public function customerCharge()
    {
        $this->charge = \Stripe\Charge::create(array(
            "amount" => $this->price * $this->ticket,
            "currency" => "usd",
            "description" => "$this->events",
            "customer" => $this->customer->id
        ));
    }

    // Create Customer Data
    public function CreateCustomerData()
    {
        $this->customerData = [
            'id' => $this->charge->customer,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address
        ];

        // Instantiate Customer
        $customer = new Customer();

        // Add Customer To DB
        $customer->addCustomer($this->customerData);
    }

    // Transaction Data
    public function customerTransection()
    {
        $this->transactionData = [
            'id' => $this->charge->id,
            'customer_id' => $this->charge->customer,
            'product' => $this->charge->description,
            'amount' => $this->charge->amount,
            'currency' => $this->charge->currency,
            'ticket' => $this->ticket,
            'status' => $this->charge->status
        ];

        // Instantiate Transaction
        $transaction = new Transaction();

        // Add Transaction To DB
        $transaction->addTransaction($this->transactionData);
    }
}
