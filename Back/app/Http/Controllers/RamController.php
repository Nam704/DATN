<?php

namespace App\Http\Controllers;

use App\Http\Requests\RamRequest;
use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    protected $ram;

    function __construct(Ram $ram)
    {
        $this->ram = $ram;
    }
    public function list()
    {
        $list = $this->ram::paginate(5);
        return view('./ram.list', compact('list'));
    }
    public function getFormAdd()
    {
        return view('ram.add');
    }
    public function add(RamRequest $req)
    {

        $data = [
            'size' => $req->ram_size,
            'unit' => $req->unit
        ];
        $this->ram::create($data);

        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'new successful additions'
            ]
        );
    }
    public function editRam($id)
    {
        $ram = $this->ram::find($id);
        return view('ram.edit', compact('ram'));
    }

    public function edit($id, RamRequest $req)
    {

        $ram = $this->ram::find($id);
        $data = [
            'size' => $req->ram_size
        ];
        $ram->update($data);
        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );
    }
    public function delete($id)
    {
        $delete = $this->ram::find($id);
        $delete->delete();
        return redirect()->route('admin.rams.list')->with(
            [
                'success' => 'Successfully repaired'
            ]
        );
    }
}
