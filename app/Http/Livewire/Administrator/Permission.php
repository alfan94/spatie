<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;
use Spatie\Permission\Models\Permission as izin;
class Permission extends Component
{

    public $name;
    public function render()
    { 
        $permisi=Izin::paginate(10);
        return view('livewire.administrator.permission',compact('permisi'));
    }
    public function permisson()
    {
$dat=izin::create(['name'=>$this->name]);
   session()->flash('message','Data berhasil Ditambahkan');
    }

    public function deletepermisi($id)
    {
        $at=Izin::find($id);
        $at->delete();
        session()->flash('message','Data berhasil Dihapus');
    }
}
