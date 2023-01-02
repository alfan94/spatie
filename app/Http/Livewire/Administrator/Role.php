<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;
use Spatie\Permission\Models\Role as rol;

class Role extends Component
{

    public $name;
    public function render()
    {
          $dat=rol::paginate(10);
        return view('livewire.administrator.role',compact('dat'));
    }

    public function roleinput()
    {
        $role = Rol::create(['name' => $this->name]);
        session()->flash('message', 'Post successfully updated.');
    }

    public function deleterol($id)
    {
          $rol=rol::find($id);
          $rol->delete();
          session()->flash('message', 'Data berhasil dihapus');
    }
}
