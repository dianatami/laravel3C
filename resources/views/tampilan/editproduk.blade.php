<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('products.update', $products->id)}}" method="POST">
        @csrf
        @method('PUT')
        <pre>
            <label>Nama</label>      : <input type="text" name="txtnama" value="{{ $products->title }}">
            <label>Deskripsi</label> : <textarea name="txtdeskripsi">{{ $products->description }}</textarea>
            <label>Harga</label>     : <input type="text" name="txtharga" value="{{ $products->price }}">
            <label>Stok</label>      : <input type="text" name="txtstok" value="{{ $products->stock }}"><br>
            <button type="submit">update</button> <button type="reset">BATAL</button>
        </pre>
    </form>
</body>
</html>