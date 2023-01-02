@extends('template.app')
@section('title')
Edit Role
@endsection

@section('content')
<div class="mx-auto w-full h-96 shadow-lg ">
    <div>
        <h1>Role Akses</h1>
         <form action="">
            <label for="">Edit Role</label>
            <input type="text" class="w-full ring-1 hover:ring-violet-500 shadow-lg rounded-lg border hover:border-sky-600" value="{{$rolee->name}}"  autofocus />
               <button class="px-5 py-2 bg-blue-500 text-white hover:bg-blue-600 block mx-auto rounded-full mt-5">Simpan</button>
         </form>

    </div>
    <div>
        <div class="flex">
        <h1>Role Pemission</h1>
 
        @if ($rolee->permissions)
        @foreach ($rolee->permissions as $item)


      <form action="{{route('permission.revoke',[$rolee->id,$item->id])}}" method="POST">
         @csrf
         @method('delete')
            <button class="bg-red-300 hover:bg-red-600 px-5 py-2 text-center text-white rounded-lg m-4 block m-4">{{$item->name}}</button>
       
          </form>
       
        @endforeach
            
        @endif

    </div>
        <form action="{{route('roles.permissions',$rolee->id)}}" method="post">
            @csrf
           <label for="">Edit Role</label>
           <select type="text" class="w-full ring-1 hover:ring-violet-500 shadow-lg rounded-lg border hover:border-sky-600" autofocus  name="permission">
            @foreach ($permisi as $per )
                
                
            <option value="{{$per->name}}">{{$per->name}}</option>
            @endforeach   
           </select>
              <button class="px-5 py-2 bg-blue-500 text-white hover:bg-blue-600 block mx-auto rounded-full mt-5">Assign</button>
        </form>

   </div>
</div>
@endsection