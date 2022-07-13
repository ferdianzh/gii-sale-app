<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\User;

class TransactionService
{
  public function addTransaction($request)
  {
    $user = User::where('username', session()->get('user'))->first();

    return Transaction::insertGetId([
      'user_id' => $user->id,
      'inventory_id' => $request->inventory_id,
      'transaction_type_id' => $request->transaction_type_id,
      'amount' => $request->amount,
    ]);
  }

  public function getInvoice($id)
  {
    $invoice = Transaction::where('transactions.id', $id)
      ->leftJoin('transaction_types', 'transactions.transaction_type_id', '=', 'transaction_types.id')
      ->leftJoin('inventories', 'transactions.inventory_id', '=', 'inventories.id')
      ->first();
    $invoice->total = $invoice->price * $invoice->amount;
    
    return $invoice;
  }
}