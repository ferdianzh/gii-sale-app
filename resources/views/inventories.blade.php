<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Inventories</title>
</head>
<body>
  @include('sidebar')
  <div class="ml-72 pt-10">
    <h1 class="text-2xl mb-4">Inventories</h1>
    <div
      class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5 w-4/5"
    >
    </div>
    <a href="{{ url('/inventories/add') }}"><button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add</button></a>
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">Name</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Stock</th>
          <th class="px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($inventories as $item)
          <tr>
            <td class="border px-4 py-2">{{ $item->name }}</td>
            <td class="border px-4 py-2">{{ $item->price }}</td>
            <td class="border px-4 py-2">{{ $item->stock }}</td>
            <td class="border px-4 py-2">
              <a href="{{ url('/inventories/'.$item->id.'/delete') }}"><button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">Delete</button></a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>