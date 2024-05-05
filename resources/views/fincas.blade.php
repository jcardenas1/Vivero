<x-cardBody>
    <x-slot:title>Fincas</x-slot:title> 
    <x-slot:container>finca-container</x-slot:container>
    @foreach ($fincas_data as $finca)
        <div class="col cards-data mb-3 ">
            <div class="card shadow-sm p-4">
                <x-cardData>
                    <x-slot:url>fincas</x-slot:url>
                    <p class="h3 card-text text-uppercase text-center 2"> Nombre: {{$finca["nombre"]}} </p>
                    <p class="h3 card-text text-uppercase text-center 2"> Catastro: {{$finca["numero_catastro"]}}</p>
                    <p class="h3 card-text text-uppercase text-center 2"> Municipio: {{$finca["municipio"]}}</p>
                    <p class="h3 card-text text-uppercase text-center 2">
                        Productor:
                        <a 
                            href="{{ url('/productores?productor_id='.$finca['productor']['id']) }}"
                            class="text-decoration-none link-opacity-10"
                        >
                            {{$finca["productor"]["nombre"]}}
                        </a>
                        </p>
                    <p class="h3 card-text text-uppercase text-center 2"> Viveros </p>
                    @foreach ($finca["viveros"] as $vivero)
                        <p class="h3 card-text text-uppercase text-center 2"> {{$vivero["nombre"]}} </p>
                    @endforeach
                </x-cardData>
            </div>
        </div>
    @endforeach
</x-cardBody>