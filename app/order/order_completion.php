<?php
/*
 * Order completion page. When PayPal is used as the payment method,
 * the buyer gets redirected here post approval / cancellation of
 * payment.
 */
require_once __DIR__ . '/../bootstrap.php';
session_start();
if(!isSignedIn()) {
	header('Location: ../user/sign_in.php');
	exit;
}

if(isset($_GET['success'])) {

	// We were redirected here from PayPal after the buyer approved/cancelled
	// the payment
	
	if($_GET['success'] == 'true' && isset($_GET['PayerID']) && isset($_GET['orderId'])) {
		$orderId = $_GET['orderId'];
		try {
			$order = getOrder($orderId);
			$payment = executePayment($order['payment_id'], $_GET['PayerID']);
			updateOrder($orderId, $payment->getState());
			$messageType = "success";
			$message = "Your payment was successful. Your order id is $orderId.";
		} catch (PPConnectionException $ex) {
			$message = parseApiError($ex->getData());
			$messageType = "error";
		} catch (Exception $ex) {
			$message = $ex->getMessage();
			$messageType = "error";
		}
		
	} else {
		$messageType = "error";
		$message = "Your payment was cancelled.";
	}
}
require_once 'orders.php';
