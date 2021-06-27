<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::latest()->get();

        return view('app.user.index', compact('data'));
    }

    public function info($tab = 'new', $id = 'all')
    {
        $data = '';
        if ($tab === 'edit') {
            $data = User::find($id);
        }

        return view('app.user.info', compact('tab', 'id', 'data'));
    }

    public function proses(Request $request, $tab = 'new', $id = 'all')
    {
        $message_validation = [
            'nip.required' => 'NIP tidak boleh kosong',
            'nip.unique' => 'NIP sudah digunakan',
            'nip.max' => 'Karakter NIP melebihi 255',
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Karakter nama melebihi 255',
        ];
        if ($tab === 'new') {
            $this->validate($request, [
                'nip' => 'required|unique:users|max:255',
                'name' => 'required|max:255',
            ], $message_validation);
            $field = User::create($request->all());
            $action = 'added';
        } elseif ($tab === 'edit') {
            $field = User::find($id);
            $field->update($request->all());
            $action = 'edit';
        }

        $message['type'] = 'success';
        $message['content'] = "Pegawai berhasil ditambahkan";
        if ($action == 'edit') {
            $message['content'] = "Pegawai berhasil diubah";
        }

        return redirect()->route('user.index')
        ->with('message', $message);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $data = User::find($id);
            $data->delete();
        }
        $message['type'] = 'success';
        $message['content'] = "Pegawai berhasil dihapus";
        return redirect()->route('user.index')
        ->with('message', $message);
    }
}
