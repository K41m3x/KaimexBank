<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 11:30 AM
 */

 use ComBank\Bank\Contracts\BankAccountInterface;
 use ComBank\Transactions\Contracts\BankTransactionInterface;
 use ComBank\Exceptions\ZeroAmountException; // Asegúrate de importar la clase correcta
 use Exception;

// Definición de la excepción personalizada

class DepositTransaction extends BaseTransaction implements BankTransactionInterface 
{
    
    public function applyTransaction(BankAccountInterface $bankAccount): float {
        if ($this->amount <= 0) {
            throw new ZeroAmountException();
        }
        return $bankAccount->getBalance() + $this->amount;
    }  

    public function getTransactionInfo(): string {
        return "DEPOSIT_TRANSACTION";
    }

    public function getAmount(): float {
        return $this->amount;
    }
}