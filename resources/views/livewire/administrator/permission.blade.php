<div>
    <div class="w-96  rounded-lg mx-auto" id="ck">
        <div>
        <form wire:submit.prevent="permisson">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
           <label for="role">Masukkan Jenis Permission</label>
           <input type="text" class="w-full ring-1 bg-blue-300 border-1 hover:border-violet-400 rounded-lg" autofocus maxlength="10" wire:model="name">
           <button class="bg-blue-300 py-2 px-5 rounded-full hover:bg-sky-600 text-white block mx-auto mt-5">Save</button>
        </form>

        
    </div>
</div>
<div>

    <a class="px-5 py-2 text-center bg-blue-500 rounded-full text-white mb-5" id="cek"><i class="bi bi-bookmark-plus"></i></a>


    <div class="col-span-12 mt-6">
        <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
             Data Permission User
            </h2>
            {{-- <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
            </div> --}}
        </div>
        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
            <table class="table table-report sm:mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th class="whitespace-nowrap">jenis Permission</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @php 
                    $no=1;
                    @endphp
                      @foreach ($permisi as $rol )
                    <tr class="intro-x">
                        <td class="w-40">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    {{$no++}}
                                </div>
                               
                        </td>
                        <td class="w-40">
                            <div class="w-10 h-10 image-fit zoom-in">
                                {{$rol->name}}
                            </div>
                           
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                            <a class="px-5 py-2 text-yellow-500 " href="{{url('edit/permission')}}/{{$rol->id}}"><i class="bi bi-pencil-square"></i> </a> 

                        </div>
                        <div class="w-10 h-10 image-fit zoom-in">
                            <a class="px-5 py-2 text-red-500"><i class="bi bi-trash" wire:click='deletepermisi({{$rol->id}})'></i> </a> 

                        </div>
                      
                           
                        </div>
                       
                </td>
                @endforeach
            </tbody>
            </table>
            <div>
        </div>
    </div>
   

<script>
     $('#cek').click(function(){
      if('#cek'==show){
        $('#ck').hide();
      }else{
        $('#ck').show();
      }
        
      
     });
</script>
</div>
