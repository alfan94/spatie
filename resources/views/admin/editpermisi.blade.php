@extends('template.app')
@section('title')
Edit Permision
@endsection

@section('content')
     <div>
        <div class="mx-auto">
            <form action="">
                  <input type="text" class="ring-1 outline-none border-1 px-5 py-2 shadow-lg rounded-lg hover:bg-violet-300 hover:border-sky-300"
                  value="{{$dat->name}}" name="name" autocomplete="" autofocus>
                  <button class="px-5 py-2 block rounded-full bg-blue-500 text-white text-center hover:bg-blue-700 shadow-xl mt-5">Update</button>
            </form>
        </div>
  <div class="mt-10 flex">
    <h1>Permission Hak Akses Role</h1>
  
        @if($dat->roles)
        @foreach ($dat->roles as $ro )
        <form action="{{route('permission.remove',[$dat->id,$ro->id])}}" method="POST">

            @csrf
            @method('delete')
            <button class="px-5 py-2 bg-red-500 hover:bg-red-800 text-white shadow-lg rounded-lg m-5">{{$ro->name}}</button>
        </form>
           
        @endforeach
        @endif

  </div>

  <div>

  </div>
        <form action="">
            @csrf
                  <select name="name" id="" class="w-full outline-none border-1 ">
                    @foreach ($role as $ror )
                        <option value="{{$ror->name}}">{{$ror->name}}</option>
                    @endforeach
                  </select>
                  <button class="px-5 py-2 block rounded-full bg-blue-500 text-white text-center hover:bg-blue-700 shadow-xl mt-5">Update</button>
            </form>
     </div>
@endsection