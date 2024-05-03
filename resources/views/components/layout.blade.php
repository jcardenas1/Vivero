<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" initial-scale="1.0">
    <title>{{$title}}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div>
        <div >
            {{$name}}
        </div>
        <div>
            {{$slot}}
        </div>
    </div>
</body>
</html>