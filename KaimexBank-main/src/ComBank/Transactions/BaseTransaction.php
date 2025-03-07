<?php
namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:24 PM
 */

use ComBank\Exceptions\InvalidArgsException;
use ComBank\Exceptions\ZeroAmountException;
use ComBank\Support\Traits\AmountValidationTrait;

abstract class BaseTransaction
{
    protected float $amount;

    use AmountValidationTrait;
    public function __construct($amount){
        $this->amount = $amount;
        $this->validateAmount($amount);
    }

}
