<x-cardBody>
    <x-slot:title>Viveros</x-slot:title> 
    <x-slot:container>viveros-container</x-slot:container>
    @foreach ($viveros_data as $vivero)
        <div class="col cards-data mb-3 ">
            <div class="card shadow-sm p-4">
                <x-cardData>
                    <x-slot:url>viveros</x-slot:url>
                    <p class="h3 card-text text-uppercase text-center 2"> Nombre: {{$vivero["nombre"]}} </p>
                    <p class="h3 card-text text-uppercase text-center 2"> Catastro: {{$vivero["numero_catastro"]}}</p>
                    <p class="h3 card-text text-uppercase text-center 2"> Municipio: {{$vivero["municipio"]}}</p>
                    <p class="h3 card-text text-uppercase text-center 2">
                        Productor:
                        <a 
                            href="{{ url('/productores?productor_id='.$vivero['productor']['id']) }}"
                            class="text-decoration-none link-opacity-10"
                        >
                            {{$vivero["productor"]["nombre"]}}
                        </a>
                        </p>
                    <p class="h3 card-text text-uppercase text-center 2"> Viveros </p>
                    @foreach ($vivero["viveros"] as $vivero)
                        <p class="h3 card-text text-uppercase text-center 2"> {{$vivero["nombre"]}} </p>
                    @endforeach
                </x-cardData>
            </div>
        </div>
    @endforeach
</x-cardBody>