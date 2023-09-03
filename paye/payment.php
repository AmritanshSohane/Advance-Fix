<?php
require('vendor/autoload.php'); // Include Razorpay SDK

use Razorpay\Api\Api;

$api = new Api('rzp_test_pRajN48CRqBHzc', 'bwG7SqlPlb6gAZucxihVO4ov');

$payment_id = $_POST['razorpay_payment_id'];

// Fetch payment information from Razorpay API
$payment = $api->payment->fetch($payment_id);

// Verify the payment
$attributes = array(
  'razorpay_order_id' => $payment->order_id,
  'razorpay_payment_id' => $payment_id,
  'razorpay_signature' => $_POST['razorpay_signature']
);

try {
  $api->utility->verifyPaymentSignature($attributes);
  // Payment signature is valid, proceed with further processing
  // Update your database, fulfill the order, etc.
} catch (Exception $e) {
  // Payment signature is invalid or an error occurred
  // Handle the error scenario
}