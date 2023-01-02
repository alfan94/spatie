<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <form action="{{url('/tes/create')}}" method="post">
        @csrf
        <input type="text" class="rounded-lg shadow-lg ring-1 hover:ring-sky-400 border-1 hover:border-violet-500"  name="nama">
        <button class="py-2 px-5 rounded-full block mx-auto bg-blue-300 text-white hover:bg-blue-600 hover:shadow-black">Simpan</button>
    </form>
         <div class="items-center flex justify-center">
            <div>
                  <table>
                    <thead>
                        <th>No</th>
                        <th>nama</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($tamtam as $tes )
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tes->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
         </div>
</body>
</html>