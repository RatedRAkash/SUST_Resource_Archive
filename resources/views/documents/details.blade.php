<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
</head>

<body>
<h2>{{$data->title}}</h2>
<h2>{{$data->description}}</h2>
<p>
    <iframe src="{{url($data->file)}}" style="width:600px; height:500px"></iframe>
    <img src="{{ url($data->file) }}" style="height: 40px; width: 70px">
</p>
</body>
</html>
