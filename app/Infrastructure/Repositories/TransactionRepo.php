<?php

namespace App\Infrastructure\Repositories;

use App\Application\Interfaces\ISaveTransaction;
use App\Application\Interfaces\IGetAmmountTransaction;
use App\Application\Interfaces\IGetTransaction;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TransactionRepo implements ISaveTransaction, IGetAmmountTransaction, IGetTransaction
{
    public function save(Model $transaction): Model
    {
        $transaction->save();

        return $transaction;
    }

    public function get(): Collection
    {
        $transaction = new Transaction;

        return $transaction->all();
    }


    public function ammount(): int
    {
        $transaction = new Transaction;
        $lista = $transaction->all();
        $ammount = 0;

        foreach ($lista as $registro) {
            $ammount += $registro->type === 'Tx' ? -1 * $registro->ammount : $registro->ammount;
        }

        return $ammount;
    }
}
