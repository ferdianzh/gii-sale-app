<?php

namespace App\Services;

use App\Models\Inventory;

class InventoryService
{
  public function getInventories()
  {
    return Inventory::get();
  }

  public function addInventory($request)
  {
    return Inventory::insert([
      'name' => $request->name,
      'price' => $request->price,
      'stock' => $request->stock,
    ]);
  }

  public function deleteInventory($id)
  {
    $inventory = Inventory::find($id);

    return $inventory->delete();
  }

  public function addStock($id, $amount)
  {
    $inventory = Inventory::where('id', $id)->first();
    $newStock = $inventory->stock + $amount;
    
    return Inventory::where('id', $id)
      ->update(['stock' => $newStock]);
  }

  public function reduceStock($id, $amount)
  {
    $inventory = Inventory::where('id', $id)->first();
    $newStock = $inventory->stock - $amount;
    
    return Inventory::where('id', $id)
      ->update(['stock' => $newStock]);
  }
}