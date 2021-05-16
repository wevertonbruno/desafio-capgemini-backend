<?php

namespace App\Application;

use App\Application\Interfaces\IGetTransaction;
use App\Http\Interfaces\IGetTransactions;
use Illuminate\Database\Eloquent\Collection;

class GetTransactions implements IGetTransactions
{

    protected $getTransaction;

    public function __construct(IGetTransaction $getTransaction)
    {
        $this->getTransaction = $getTransaction;
    }

    public function execute(): Collection
    {
        return $this->getTransaction->get();
    }
}
