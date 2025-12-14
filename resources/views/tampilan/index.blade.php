<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('products.create')}}">Tambah Produk</a>
    <table border="1">
        <tr>
            <td>Nama</td>
            <td>Deskripsi</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Pilihan</td>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
                <form action="{{route('products.destroy', $product->id)}}" method="POST" >
                    @csrf
                    @method('DELETE')
                <a href="{{route('products.edit', $product->id)}}">Edit</a>
                <button type="submit">HAPUS</button>
                </form>
            </td>
        </tr>
        @empty
        <h2>Data belum ada</h2>

        @endforelse
    </table>
</body>
</html>