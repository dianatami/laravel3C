<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 min-h-screen">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 mb-6 text-center tracking-tight">
                ✏️ EDIT PRODUK
            </h1>
            
            <form action="{{route('products.update', $products->id)}}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                
                <!-- Input Nama -->
                <div>
                    <label for="txtnama" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Produk
                    </label>
                    <input 
                        type="text" 
                        name="txtnama" 
                        id="txtnama"
                        value="{{ $products->title }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan nama produk"
                        required>
                </div>

                <!-- Input Deskripsi -->
                <div>
                    <label for="txtdeskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea 
                        name="txtdeskripsi" 
                        id="txtdeskripsi"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                        placeholder="Masukkan deskripsi produk"
                        required>{{ $products->description }}</textarea>
                </div>

                <!-- Input Harga -->
                <div>
                    <label for="txtharga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga
                    </label>
                    <input 
                        type="text" 
                        name="txtharga" 
                        id="txtharga"
                        value="{{ $products->price }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan harga produk"
                        required>
                </div>

                <!-- Input Stok -->
                <div>
                    <label for="txtstok" class="block text-sm font-medium text-gray-700 mb-2">
                        Stok
                    </label>
                    <input 
                        type="text" 
                        name="txtstok" 
                        id="txtstok"
                        value="{{ $products->stock }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan jumlah stok"
                        required>
                </div>

                <!-- Buttons -->
                <div class="flex gap-3 pt-4">
                    <button 
                        type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                        UPDATE
                    </button>
                    <button 
                        type="reset"
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 ease-in-out">
                        BATAL
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>