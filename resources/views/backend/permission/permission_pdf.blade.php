<!DOCTYPE html>
<html>
<head>
    <title>Permissions PDF</title>
    <style>
        #tables {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tables td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tables tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tables tr:hover {
            background-color: #ddd;
        }

        #tables th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<h1>Permissions Table</h1>

<table id="tables">
    <thead>
    <tr>
        <th>Sl</th>
        <th>Permission Name</th>
        <th>Group Name</th>
    </tr>
    </thead>
    <tbody>
        @foreach($permission as $key=>$row)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->name }}</td>
                <td>{{$row->group_name  }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

</body>
</html>


