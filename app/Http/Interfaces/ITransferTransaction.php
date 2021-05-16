<?php

namespace App\Http\Interfaces;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;

interface ITransferTransaction
{
    public function execute(TransactionRequest $request): Transaction;
}
