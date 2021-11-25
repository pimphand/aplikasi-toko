<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->when(request()->q, function ($products) {
            $products = $products->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('pages.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'name'              => 'required',
            'jumlahDomba'       => 'required',
            'jumlahBox'         => 'required',
            'jumlahSate'        => 'required',
            'menu'            => 'required',
            'harga'            => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('admin.products.index')->with('success','berhasil ditambahkan !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.admin.product.edit',compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'              => 'required',
            'jumlahDomba'       => 'required',
            'jumlahBox'         => 'required',
            'jumlahSate'        => 'required',
            'menu'            => 'required',
            'harga'            => 'required',
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success','berhasil diupdate !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        if ($product) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }

    }
}
