<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        if ($request->has("search")) {
            $data = Employee::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        } else {
            $data = Employee::paginate(5);
        }
        
        return view("datapegawai", compact("data"));
    }

    public function tambahpegawai() {
        return view("tambahdata");
    }

    public function insertdata(Request $request) {
        // dd($request->all());
        $data = Employee::create($request->all());
        if ($request->hasFile("foto")) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success',' Data Berhasil Di Tambah');
    }

    public function tampildata($id) {
        $data = Employee::find($id);
        
        return view('tampildata', compact('data'));
    }

    public function updatedata($id, Request $request) {
        $data = Employee::find($id);

        $data->update($request->all());
        return redirect()->route('pegawai')->with('success',' Data Berhasil Di Update');
    }

    public function deletedata($id) {
        $data = Employee::find($id);

        $data->delete();
        return redirect()->route('pegawai')->with('success',' Data Berhasil Di Delete');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadView('datapegawai-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel() {
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
}
