<?php

namespace App\Application;

use App\Application\Interfaces\IGetAmmountTransaction;
use App\Http\Interfaces\IGetAmmount;

class GetAmmount implements IGetAmmount
{

    protected $getAmmountTransaction;

    public function __construct(IGetAmmountTransaction $getAmmountTransaction)
    {
        $this->getAmmountTransaction = $getAmmountTransaction;
    }

    public function execute(): int
    {
        return $this->getAmmountTransaction->ammount();
    }
}
