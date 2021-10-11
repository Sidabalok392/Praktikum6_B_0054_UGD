<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Mail;
use App\Mail\StudentMail;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///Mengambil data faculty dan mengurutkannya dari kecil ke besar berdasarkan id
        $students = Student::orderBy('id', 'ASC')->get();

        /// Mengirimkan variabel $faculties ke halaman views facultyCRUD/index.blade.php
        return view('studentCRUD.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ///menampilkan halaman create
        return view('studentCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///membuat validasi , wajib diisi
            $request->validate([
                'nama_depan' => 'required|max:15',
                'nama_belakang' => 'required|max:15',
                'email' => 'required|max:25',
                'no_telp' => 'required|min:10|max:13',
                'tempat_lahir' => 'required|max:15',
                'tanggal_lahir' => 'required|date'
            ]);

            /// insert setiap req dari form ke dalam database via model
            /// jika menggunakan metode ini, maka nama field dan nama form harus sama
            Student::create($request->all());
        /// Mengirimkan Email
        
            return redirect()->route('students.index')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ///cari berdasarkan id
        $students = Student::find($id);
        ///menampilkan view show dengan menyertakan data faculties
        return view('studentCRUD.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ///cari berdasarkan id
        $students = Student::find($id);
        /// menampilkan view edit dengan menyertakan data faculties
        return view('studentCRUD.edit',compact('students'));
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
        $request->validate([
                'nama_depan' => 'required|max:15',
                'nama_belakang' => 'required|max:15',
                'email' => 'required|max:25',
                'no_telp' => 'required|min:10|max:13',
                'tempat_lahir' => 'required|max:15',
                'tanggal_lahir' => 'required|date'
            ]);


        Student::find($id)->update($request->all());
        

        return redirect()->route('students.index')->with('success','Item update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        Student::find($id)->delete();
        ///melakukan hapus data berdasarkan parameter yang dikirimkan
        /// $faculties->delete();

        return redirect()->route('students.index')
                        ->with('success','Item deleted successfully');
    }

    public function email()
    {
        try{
            $students = Student::orderBy('updated_at')->get();
            Mail::to('shirohaku12@gmail.com')->send(new StudentMail($students));
            return redirect()->route('students.index')->with('success','Berhasil Terkirim!');
        }catch(Exception $e){
            return redirect()->route('students.index')->with('success','gagal!');
        }
    }
}
