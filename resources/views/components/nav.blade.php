<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" initial-scale="1.0">
        <title>{{$title}}</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.js'])
    </head>
    <body>
        <div class="container-fluid p-2 shadow-sm options-nav">
            <div class="row grid-row row-cols-2" >   
                <p class="text-initial h2 nav-title">{{$title}}</p>
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
        {{$slot}}
    </body>
</html>