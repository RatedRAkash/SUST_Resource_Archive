<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
</head>

<body>
<table>
    <tr>
    <th>S1</th>
    <th>Title</th>
    <th>Description</th>
    <th>View</th>
    <th>Download</th>
    </tr>

    @foreach($file as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->title}}</td>
        <td>{{$data->descritpion}}</td>
        <td><a href="{{url('documents_show/'.$data->id)}}">View</a></td>
        <td><a href="{{url('documents_download/'.$data->id)}}">Download</a></td>

    </tr>
    @endforeach
</table>


</body>
</html>
