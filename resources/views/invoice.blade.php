<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Invoice</title>
</head>
<body>
  @include('sidebar')
  <div class="ml-72 pt-10">
    <h1 class="text-2xl mb-4">Transaksi {{ $trans_id }}</h1>
    <div class="max-w-sm w-full lg:max-w-full lg:flex">
      <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-2">
          <div class="text-gray-900 font-bold text-xl mb-2">Total harga: Rp.{{ $invoice->total }}</div>
          <p class="text-gray-700 text-base">Nama barang: {{ $invoice->name }}</p>
        </div>
        <div class="flex items-center">
          <div class="text-sm">
            <p class="text-gray-900 leading-none">Jumlah {{ $invoice->transaction_type_id == 1 ? 'pembelian' : 'penjualan' }}: {{ $invoice->amount }}</p>
            <p class="text-gray-900 leading-none">Harga satuan: {{ $invoice->price }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
