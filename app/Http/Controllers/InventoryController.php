<?php

namespace App\Http\Controllers;

use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    private $inventoryService;

    public function __construct(InventoryService $service)
    {
        $this->inventoryService = $service;
    }

    public function index()
    {
        $data = [
            'inventories' => $this->inventoryService->getInventories(),
        ];

        return view('inventories', $data);
    }

    public function add()
    {
        return view('inventories-add');
    }

    public function store(Request $request)
    {
        $added = $this->inventoryService->addInventory($request);

        if (!$added) {
            return redirect()->back()->with('message', 'save failed');
        }

        return redirect()->route('main')->with('message', 'save completed');
    }

    public function delete(Request $request)
    {
        $deleted = $this->inventoryService->deleteInventory($request->id);

        if (!$deleted) {
            return redirect()->back()->with('message', 'delete failed');
        }
        
        return redirect()->route('main')->with('message', 'delete completed');
    }
}
