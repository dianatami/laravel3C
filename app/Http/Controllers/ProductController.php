<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index() : View
    {
        // ini coding untuk get atau ambil data dri model dgn format terbaru dan dibagi menjadi 10 data halaman
        $products = Product::latest()->paginate(10);

        //ini coding akses ke view bersama dengan data
        return view('tampilan.index', compact('products'));

    }

    public function create() : View
    {
        return view('tampilan.inputproduk');
    }
    
    public function store(Request $request) : RedirectResponse
    {
        //validasi
        $request->validate=([
            'txtnama' => 'required', 
            'txtdeskripsi' => 'required|min:5',
            'txtharga' => 'required|numeric',
            'txtstok' => 'required|numeric'
            //required = validasi untuk memastikan data terisi semua
            //min:5 = "jika desk diisi kurang dari 5 karakter maka data tidak bisa dimasukan
            //numeric= validasi untuk memastikan hanya data numeric yang dimasukan
        ]);

        Product::create([
            'title' => $request->txtnama,
            'description' => $request->txtdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');
    }

    public function edit(string $id)
    {
        //coding ke model ambil data berdasarkan id
        $products = Product::findOrFail($id);

        //coding ke view dgn data yg sdh di dpt (id)
        return view('tampilan.editproduk', compact('products'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validasi
        $request->validate=([
            'txtnama' => 'required', 
            'txtdeskripsi' => 'required|min:5',
            'txtharga' => 'required|numeric',
            'txtstok' => 'required|numeric'
            //required = validasi untuk memastikan data terisi semua
            //min:5 = "jika desk diisi kurang dari 5 karakter maka data tidak bisa dimasukan
            //numeric= validasi untuk memastikan hanya data numeric yang dimasukan
        ]);

        //cari data yg mau diupdate (id)
        $products = Product::findOrFail($id);

        $products->update([
            'title' => $request->txtnama,
            'description' => $request->txtdeskripsi,
            'price' => $request->txtharga,
            'stock' => $request->txtstok
        ]);

        return redirect()->route('products.index');        
    }

    public function destroy(string $id) : RedirectResponse
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect()->route('products.index');        

    }
}
