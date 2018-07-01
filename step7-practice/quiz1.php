<?php

/**
 * Compute the payment for a delivery of recyclables.
 * A delivery has a price per pound and a number of pounds.
 * The payment is the product of the two.
 */
class Delivery {
	/**
	 * Delivery constructor.
	 * @param $pricePerPound Price we pay per pound of recyclable
	 * @param $pounds Number of pounds we return
	 */
	public function __construct($pricePerPound, $pounds) {
		$this->pricePerPound = $pricePerPound;
		$this->pounds = $pounds;
	}

	/**
	 * Compute the payment for this recyclable
	 * @return Price in dollars
	 */
	public function payment() {
		return $this->pounds * $this->pricePerPound;
	}

	/**
	 * @return Number of pounds
	 */
	public function getPounds() {
		return $this->pounds;
	}

	private $pricePerPound;	///< Price per pound
	private $pounds;		///< Number of pounds
}

class PremiumDelivery extends Delivery {
    public function __construct($pricePerPound, $pounds, $price) {
        parent::__construct($pricePerPound, $pounds);
        $this->mPremium = $price;
    }
    public function payment() {
        return parent::payment() + (parent::payment() * $this->mPremium);
    }
    public function getTons() {
        return parent::getPounds() / 2000;
    }

    private $mPremium;

}
