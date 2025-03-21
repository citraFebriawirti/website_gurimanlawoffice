<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You Must Login First');
        }

        $data['product'] = DB::table('tb_product')->get();

        return view('pages.halaman_admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        return view('pages.halaman_admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title_product' => 'required',
            'description_product' => 'required',
            'status_product' => 'required',
        ]);





        $create = Product::create([
            'id_product' => Product::GenerateID(),
            'title_product' => $request->title_product,
            'status_product' => $request->status_product,
            'description_product' => $request->description_product,
        ]);

        return $create
            ? redirect()->route('product.index')->with('success', 'Data Added Successfully')
            : redirect()->back()->with('error', 'Data Added Failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Session::get('id_user')) {
            return redirect('/login')->with('error', 'You must login first');
        }

        $data['dataById'] = DB::table('tb_product')->where('id_product', $id)->first();
        return view('pages.halaman_admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'title_product' => 'required',
            'description_product' => 'required',
            'status_product' => 'required',
        ]);




        $dataById = DB::table('tb_product')->where('id_product', $id)->first();



        $update = product::where('id_product', $id)->update([
            'title_product' => $request->title_product,
            'status_product' => $request->status_product,
            'description_product' => $request->description_product,
        ]);

        if ($update) {

            return redirect()->route('product.index')->with('success', 'Data updated successfully');
        } else {

            return redirect()->route('product.index')->with('error', 'data failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (DB::table('tb_product')->where('id_product', $id)->delete()) {
            return redirect()->route('product.index')->with('success', 'Data Delete successfully');
        }

        return redirect()->route('product.index')->with('error', 'Data Failed to Delete');
    }
}
