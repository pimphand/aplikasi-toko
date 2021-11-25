<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonCostumer;
use App\Models\Costumer;
use Illuminate\Http\Request;
class CalonCostumers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calonCostumers = CalonCostumer::latest()->with('costumer')->whereHas('costumer',function($query){
            $query->when(request()->q, function ($calonCostumers) {
            $calonCostumers = $calonCostumers->where('name', 'like', '%' . request()->q . '%');
        });
        })->paginate(10);;
        return view('pages.admin.caloncostumer.index',compact('calonCostumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumer= Costumer::all();
        return view('pages.admin.caloncostumer.create',compact("costumer"));
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
            'tanggalMasuk'              => 'required',
            'keterangan'              => 'required',
            
        ]);

        CalonCostumer::create($request->all());
        return redirect()->route('admin.calonCostumers.index')->with('success','Berhasil ditambahkan !!');
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
        $costumer = CalonCostumer::with('costumer')->findOrFail($id);
        return view('pages.admin.caloncostumer.edit',compact("costumer"));
        
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
            'tanggalMasuk'              => 'required',
            'keterangan'              => 'required',
            
        ]);

        $costumer = CalonCostumer::with('costumer')->findOrFail($id);
        $costumer->update($request->all());
        return redirect()->route('admin.calonCostumers.index')->with('success','Berhasil di update !!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $calon = CalonCostumer::findOrFail($id);
        $calon->delete();
          if ($calon) {
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
