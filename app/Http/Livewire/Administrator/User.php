<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;
use App\Models\User as Orang;
use Spatie\Permission\Models\Role as rol;
use Illuminate\Support\Facades\Auth;

class User extends Component
{
    public function render()
    {
       

    $use=Orang::paginate(20);
    //$rolr=\Auth::user()->getRoleNames();
    
        return view('livewire.administrator.user',compact('use'));
    }
}
