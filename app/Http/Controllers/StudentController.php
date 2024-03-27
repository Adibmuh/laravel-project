<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{

    public function index() {
        $students = DB::select('SELECT * FROM student');

        return View('dashboard', ['students' => $students]);
    }

    public function store(Request $req) {
        $req->validate([
            'name' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
        ]);

        DB::insert('INSERT INTO student (name, alamat, umur) VALUES (:nama_siswa, :alamat_siswa, :umur_siswa)', [
            'nama_siswa' => $req->name,
            'alamat_siswa' => $req->alamat,
            'umur_siswa' => $req->umur,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id) {
        DB::delete('DELETE FROM student WHERE id = :id_student', ['id_student' => $id]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id) {
        $student_id =  DB::select('SELECT * FROM student WHERE id = :id_student limit 1', ['id_student' => $id]);

        return View('update-student', ['student' => $student_id[0]]);
    }

    public function update(Request $req) {
        $req->validate([
            'name' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
        ]);

        DB::update('UPDATE student SET name=:nama_siswa, umur=:umur_siswa, alamat=:alamat_siswa WHERE id=:id ', [
            'nama_siswa' => $req->name,
            'alamat_siswa' => $req->alamat,
            'umur_siswa' => $req->umur,
            'id' => $req->id
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil diubah.');
    }
}
