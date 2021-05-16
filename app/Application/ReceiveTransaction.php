<?php

namespace App\Application;

use App\Application\Interfaces\ISaveTransaction;
use App\Http\Interfaces\IReceiveTransaction;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;

class ReceiveTransaction implements IReceiveTransaction
{

    protected $saveTransaction;

    public function __construct(ISaveTransaction $saveTransaction)
    {
        $this->saveTransaction = $saveTransaction;
    }


    public function execute(TransactionRequest $request): Transaction
    {
        $transaction = new Transaction;

        $transaction->ammount = intval($request->input('ammount') * 100);
        $transaction->type = 'Rx';
        $saved = $this->saveTransaction->save($transaction);

        return $saved;
    }
}
