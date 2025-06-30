<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Menampilkan semua produk
     */
    public function index()
    {
        $product = Product::select('products.id','products.name','products.name','products.slug',
            'products.image','products.description','products.price','products.stock',
            'categories.name as nama_kategori')
            ->join('categories','products.category_id','=','categories.id')
            ->orderBy('products.created_at','DESC')
            ->get();

        $res = [
            'succsess' => true,
            'messsage' => 'List Product',
            'data' => $product,
        ];

        return response()->json($res,200);
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/products');
        }

        $product = Product::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $product,
        ], 201);
    }

    /**
     * Menampilkan detail produk
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (! $product) {
            $res = [
                'succsess' => false,
                'message' => 'Produk tidak ditemukan',
            ];
            return response()->json($res,404);
        }

        $res = [
                'succsess' => true,
                'message' => 'Produk ditemukan',
                'data' => $product,
            ];
            return response()->json($res,200);
    }

    /**
     * Mengupdate produk
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'        => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'sometimes|required|numeric|min:0',
            'stock'       => 'sometimes|required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/products');
        }

        $product->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $product,
        ], 200);
    }

    /**
     * Menghapus produk
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Produk berhasil dihapus',
        ], 200);
    }
}
