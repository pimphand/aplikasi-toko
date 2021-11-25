<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::latest()->when(request()->q, function ($costumers) {
            $costumers = $costumers->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('pages.admin.costumers.index',compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.costumers.create');
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
            'name'              => 'required|unique:costumers',
            'phone'             => 'required|unique:costumers',
            'jk'                => 'required',
            'alamat'            => 'required',
        ]);

        Costumer::create($request->all());
        return redirect()->route('admin.costumers.index')->with('success','Berhasil di tambahkan !!');
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
         $costumer = Costumer::findOrFail($id);
        return view('pages.admin.costumers.edit',compact('costumer'));
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
            'phone'             => 'required',
            'jk'                => 'required',
            'alamat'            => 'required',
        ]);
        $costumer = Costumer::findOrFail($id);
        $costumer->update($request->all());
        return redirect()->route('admin.costumers.index')->with('success','Berhasil di edit !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = Costumer::findOrFail($id);
        $cost->delete();
          if ($cost) {
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
