<?php

namespace App\Http\Interfaces;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;

interface IReceiveTransaction
{
    public function execute(TransactionRequest $request): Transaction;
}
