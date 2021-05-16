<?php

namespace App\Application\Interfaces;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

interface ISaveTransaction
{
    public function save(Model $transaction): Model;
}
