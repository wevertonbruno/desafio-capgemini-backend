<?php

namespace App\Http\Controllers;

use App\Exceptions\InsufficientFundsException;
use App\Http\Interfaces\IGetAmmount;
use App\Http\Interfaces\IGetTransactions;
use App\Http\Interfaces\IReceiveTransaction;
use App\Http\Interfaces\ITransferTransaction;
use App\Http\Requests\TransactionRequest;
use Exception;

class TransactionController extends Controller
{
    protected $getTransactions;
    protected $getAmmount;
    protected $transferTransaction;
    protected $receiveTransaction;

    public function __construct(
        IGetTransactions $getTransactions,
        IGetAmmount $getAmmount,
        ITransferTransaction $transferTransaction,
        IReceiveTransaction $receiveTransaction
    ) {
        $this->getTransactions = $getTransactions;
        $this->getAmmount = $getAmmount;
        $this->transferTransaction = $transferTransaction;
        $this->receiveTransaction = $receiveTransaction;
    }

    public function get()
    {
        try {
            $data = $this->getTransactions->execute();

            return response()->json([
                'success' => true,
                'transactions' => $data
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function ammount()
    {
        try {
            $data = $this->getAmmount->execute();

            return response()->json([
                'success' => true,
                "ammount" => $data
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function transfer(TransactionRequest $request)
    {
        try {
            $request->validated();
            $data = $this->transferTransaction->execute($request);

            return response()->json([
                'success' => true,
                'transaction' => $data
            ], 201);
        } catch (InsufficientFundsException $e) {
            return response()->json([
                'message' => 'Saldo insuficiente',
                'success' => false
            ], 403);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }

    public function receive(TransactionRequest $request)
    {
        try {

            $request->validated();
            $data = $this->receiveTransaction->execute($request);

            return response()->json([
                'success' => true,
                'transaction' => $data
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'success' => false
            ], 500);
        }
    }
}
