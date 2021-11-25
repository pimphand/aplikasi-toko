<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agens = Agen::latest()->when(request()->q, function ($agens) {
            $agens = $agens->where('name', 'like', '%' . request()->q . '%');
        })->paginate(10);
        return view('pages.admin.agen.index',compact('agens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.agen.create');
        
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
            'name'              => 'required|unique:agens',
            'phone'             => 'required|unique:agens',
            'jk'                => 'required',
            'alamat'            => 'required',
        ]);

        Agen::create($request->all());
        return redirect()->route('admin.agens.index')->with('success','Berhasil di tambahkan !!');
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
        $agen = Agen::findOrFail($id);
        return view('pages.admin.agen.edit',compact('agen'));
        
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
        $agen = Agen::findOrFail($id);
        $agen->update($request->all());
        return redirect()->route('admin.agens.index')->with('success','Berhasil di edit !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $agen = Agen::findOrFail($id);
        $agen->delete();
          if ($agen) {
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
