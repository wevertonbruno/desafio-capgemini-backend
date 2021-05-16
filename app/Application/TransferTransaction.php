<?php

namespace App\Application;

use App\Application\Interfaces\IGetAmmountTransaction;
use App\Application\Interfaces\ISaveTransaction;
use App\Exceptions\InsufficientFundsException;
use App\Http\Interfaces\ITransferTransaction;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;

class TransferTransaction implements ITransferTransaction
{

    protected $saveTransaction;
    protected $getAmmountTransaction;

    public function __construct(ISaveTransaction $saveTransaction, IGetAmmountTransaction $getAmmountTransaction)
    {
        $this->saveTransaction = $saveTransaction;
        $this->getAmmountTransaction = $getAmmountTransaction;
    }

    public function execute(TransactionRequest $request): Transaction
    {
        $repository = new Transaction;

        $ammount = intval($request->input('ammount') * 100);
        $currentAmmount = $this->getAmmountTransaction->ammount();

        if ($currentAmmount < $ammount) {
            throw new InsufficientFundsException;
        }

        $repository->ammount = $ammount;
        $repository->type = 'Tx';
        $saved = $this->saveTransaction->save($repository);

        return $saved;
    }
}
