<x-nav>
    <x-slot:title>Vivero</x-slot:title>
    <div class="container-fluid  justify-content-center align-content-center home-container">
        <div class="row row-cols-1 mt-4">
            <div class="col mb-4 ">
                <p class="text-center h1 home-title">Vivero Artemis</p>
            </div>
        </div>
        <div class="row grid-row">
            @foreach ($vivero_data as $data)
            <div class="col cards-data">
                <div class="card shadow-sm" >
                    <a 
                        href="{{ url('/'.$data) }}" 
                        class="text-decoration-none link-opacity-10"
                    >
                        <img 
                            src="{{URL::asset('images/'.$data.'.webp')}}" 
                            class="card-img-top" alt="$data"
                        >
                        <div class="card-body pt-2 pb-2">
                            <p 
                                class="h4 card-text text-uppercase text-center 2"
                            >
                                {{$data}}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-nav> 
