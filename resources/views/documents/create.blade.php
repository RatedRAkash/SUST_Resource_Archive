<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
</head>
<body>
<form action="{{url('/documents')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="title" placeholder="title">
    <input type="text" name="description" placeholder="description">
    <input type="file" name="file">
    <input type="submit" value="Submit">
</form>

</body>
</html>