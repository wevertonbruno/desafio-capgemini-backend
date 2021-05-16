<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface IGetTransactions
{
    public function execute(): Collection;
}
