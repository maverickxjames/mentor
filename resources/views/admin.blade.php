<?php 

use App\Models\Subscribe;
use Illuminate\Support\Facades\Storage;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
</head>

<body>
    <div class="container">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>SR</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>College</th>
                    <th>College ID</th>
                    <th>Year</th>
                    <th>NEET AIR</th>
                    <th>Scorecard</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $subscribes = Subscribe::all();
                    ?>
                @foreach($subscribes as $key => $subscribe)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $subscribe->name }}</td>
                    <td>{{ $subscribe->email }}</td>
                    <td>{{ $subscribe->phone }}</td>
                    <td>{{ $subscribe->college }}</td>
                    <td>
                        <img src="{{ asset('uploads/college/'.$subscribe->collegeproof) }}" alt="" width="40px" height="auto">
                    </td>
                    <td>{{ $subscribe->year }}</td>
                    <td>{{ $subscribe->score }}</td>
                    <td>  <img src="{{ asset('uploads/score/'.$subscribe->scoreproof) }}" alt="" width="40px" height="auto"></td>
                    <td>{{ $subscribe->created_at }}</td>
                    <td>{{ $subscribe->created_at }}</td>
                    <td>
                        @php
                            if($subscribe->status == 0){
                                echo '<a href="/admin/verify/'.$subscribe->id.'" class="btn btn-primary">Verify</a>';
                            }else if($subscribe->status == 2){
                                echo '<a href="/admin/verify/'.$subscribe->id.'" class="btn btn-primary">Verify</a>';
                            }else if($subscribe->status == 3){
                                echo 'Permanent Ban';
                            }else{
                                echo '<div><a href="/admin/temp_ban/'.$subscribe->id.'" class="btn btn-primary">Temporary Ban</a>
                                    <a href="/admin/perm_ban/'.$subscribe->id.'" class="btn btn-danger">Permanent Ban</a>
                                    </div>';
                            }
                        @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
          
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function() {
            
            new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5','print']
        }
    }
});
        });
    </script>
</body>

</html>