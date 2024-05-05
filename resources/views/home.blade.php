<x-cardBody>
    <x-slot:title>Vivero Artemis</x-slot:title> 
    <x-slot:container>home-container</x-slot:container> 
    @foreach ($vivero_data as $data)
        <a 
            href="{{ url('/'.$data) }}" 
            class="text-decoration-none link-opacity-10"
        >
            <div class="col cards-data">
                <div class="card shadow-sm" >
                    <x-cardData>
                        <x-slot:url>{{$data}}</x-slot:url>
                        <div class="card-body pt-2 pb-2">
                                <p 
                                    class="h3 card-text text-uppercase text-center 2"
                                >
                                    {{$data}}
                                </p>
                            </div>
                    </x-cardData>
                </div>
            </div>
        </a>
    @endforeach

</x-cardBody>
