<html>
<head>
    <title>User Info</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="{{route('show_user_form')}}" class="btn btn-primary btn-sm mt-2 mb-3">Add User Record</a>
    <table class="table" id="userinfotbl">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Nationality</th>
            <th>Date of birth</th>
            <th>Education Background</th>
            <th>Mode of Contact</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
            <tr>
                <td>{{$data[0]}}</td>
                <td>{{$data[1]}}</td>
                <td>{{$data[2]}}</td>
                <td>{{$data[3]}}</td>
                <td>{{$data[4]}}</td>
                <td>{{$data[5]}}</td>
                <td>{{$data[6]}}</td>
                <td>{{$data[7]}}</td>
                <td>{{$data[8]}}</td>
                <td>{{$data[9]}}</td>
                <td><a href="{{route('show_user_form',$data[0])}}">Edit</a> | <a href="{{route('delete_user_info',$data[0])}}">Delete</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $('#userinfotbl').DataTable(
        {
            columnDefs: [
                {
                    targets: [0],
                    visible: false,
                    searchable: false,
                    sortable: false
                }
            ],
            order: [
                [0, 'desc'],
            ]
        }
    );
</script>
</body>
</html>