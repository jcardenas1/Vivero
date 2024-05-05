<x-nav>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="container-fluid  justify-content-center align-content-center mt-4 {{$container}}">
        <div class="row grid-row row-cols-3">
            {{$slot}}
        </div>
    </div>
</x-nav> 

