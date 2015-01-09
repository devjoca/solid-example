<?php

define('PAYMENT_COST', 20);

class Order {
	private $amount;

	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}
}

/**
 * Primer tipo de pago
 */
/*
class PaymentCalculator {

	public function calcTotalAmount(Order $order)
	{
		return $order->getAmount() + PAYMENT_COST;
	}
}
*/


/**
 * Clase cuando se agrega un nuevo tipo de pago
 */
class PaymentCalculator {

	public function calcTotalAmount(Order $order, $type)
	{
		if ($type == 'normal')
			return $order->getAmount() + PAYMENT_COST;
		else if ($type == 'suscriptor')
			return $order->getAmount() + PAYMENT_COST*0.5;
	}
}

/**
 * Clases refactorizadas
 */

interface paymentMethod {
	public function calcPayment(Order $order);
}

class normalPayment implements paymentMethod {
	public function calcPayment(Order $order)
	{
		return $order->getAmount() + PAYMENT_COST;
	}
}

class suscriptorPayment implements paymentMethod {
	public function calcPayment(Order $order)
	{
		return $order->getAmount() + PAYMENT_COST*-0.5;
	}
}

$order = new Order();
$order->setAmount(100);

$paymentCalculator = new normalPayment();
echo $paymentCalculator->calcPayment($order);