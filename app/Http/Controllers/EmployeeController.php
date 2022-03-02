<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;



class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        // search
        if ($request->has('search')){
            $data = Employee::where('nama', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }
        
        
        return view('index',compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function insert(Request $request)
    {
        
        $data = Employee::create($request->all());
        // upload image
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('image/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        if ($request->hasFile('dokumen')) {
            $request->file('dokumen')->move('dokumen/', $request->file('dokumen')->getClientOriginalName());
            $data->foto = $request->file('dokumen')->getClientOriginalName();
            $data->save();
        }

        return redirect('/home')->with('status','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Employee::find($id);
        
        return view('edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        Employee::find($id)->update($request->all());

        return redirect('/home')->with('status','Data Berhasil Diubah');
    }
    
    public function delete($id)
    {
        Employee::find($id)->delete();

        return redirect('/home')->with('status','Data Berhasil Dihapus');
    }

    
}
