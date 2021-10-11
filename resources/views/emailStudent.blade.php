<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <table style="width: 100%;">
            <tr>
                <td> 
                    <a href="http://www.uajy.ac.id/">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/UAJY_Logo.png" style="height: 100px; width: 100px;">          
                    </a>   
                </td>
                <td>
                    <h1 style="text-align: right;">190710054</h1> 
                </td>  
            </tr>
        </table>

        <hr>
   
    <h1 align='center'> Data Mahasiswa </h1>        
    <table align='center' border='1' style="border-collapse: collapse;">
    <tr>
            <th width="20px"class="text-center">No</th>
            <th width="300px" class="text-center">Nama</th>
            <th width="300px" class="text-center">Email</th>
            <th width="300px" class="text-center">Phone Number</th>
            <th width="300px" class="text-center">Place & Date of Birth</th>
    </tr>

    @if(count($detail))
    @foreach ($detail as $student)
    
    <tr>
        <td class="text-center">{{ $student->id }}</td>
        <td>{{ $student->nama_depan }} {{ $student->nama_belakang }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->no_telp }}</td>
        <td>{{ $student->tempat_lahir }}, {{ $student->tanggal_lahir }}</td>
    </tr>

    @endforeach
    @else
    <tr>
        <td align="center" colspan="5"> Empty Data! Have a nive day :)</td>
    </tr>
    @endif
    
    </table>
    </body>
</html>