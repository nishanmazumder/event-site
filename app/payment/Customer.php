<?php

namespace App\Payment;

use App\Payment\PaymentDatabase;

class Customer
{
  private $db;

  public function __construct()
  {
    $this->db = new PaymentDatabase;
  }

  public function addCustomer($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO customers (id, first_name, last_name, email, phone, address) VALUES(:id, :first_name, :last_name, :email, :phone, :address)');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':address', $data['address']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getCustomers()
  {
    $this->db->query('SELECT * FROM customers ORDER BY created_at DESC');

    $results = $this->db->resultset();

    return $results;
  }
}
