<?php

namespace App\Http\Controllers;

use App\Services\InventoryService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $inventoryService;
    private $transactionService;
    
    public function __construct(
        InventoryService $inventoryService,
        TransactionService $transactionService
    ) {
        $this->inventoryService = $inventoryService;
        $this->transactionService = $transactionService;
    }

    public function beli()
    {
        $data = [
            'inventories' => $this->inventoryService->getInventories(),
        ];

        return view('pembelian', $data);
    }

    public function jual()
    {
        $data = [
            'inventories' => $this->inventoryService->getInventories(),
        ];

        return view('penjualan', $data);
    }

    public function storeBeli(Request $request)
    {
        $transCompleted = $this->transactionService->addTransaction($request);
        if (!$transCompleted) {
            return redirect()->back()->with('message', 'transaction failed');
        }
        
        $stockUpdated = $this->inventoryService->addStock($request->inventory_id, $request->amount);
        if (!$stockUpdated) {
            return redirect()->back()->with('message', 'transaction failed');
        }

        $data = [
            'invoice' => $this->transactionService->getInvoice($transCompleted),
            'trans_id' => $transCompleted,
        ];

        return view('invoice', $data);
    }

    public function storeJual(Request $request)
    {
        $transCompleted = $this->transactionService->addTransaction($request);
        if (!$transCompleted) {
            return redirect()->back()->with('message', 'transaction failed');
        }
        
        $stockUpdated = $this->inventoryService->reduceStock($request->inventory_id, $request->amount);
        if (!$stockUpdated) {
            return redirect()->back()->with('message', 'transaction failed');
        }

        $data = [
            'invoice' => $this->transactionService->getInvoice($transCompleted),
            'trans_id' => $transCompleted,
        ];

        return view('invoice', $data);
    }
}
