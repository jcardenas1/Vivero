<x-cardBody>
    <x-slot:title>Productores</x-slot:title> 
    <x-slot:container>productores-container</x-slot:container> 
    @foreach ($productores_data as $productor)
        <div class="col cards-data mb-3 ">
            <div class="card shadow-sm p-4">
                <x-cardData>
                    <x-slot:url>productores</x-slot:url>
                        <p class="h3 card-text text-uppercase text-center 2"> Nombre: {{$productor["nombre"]}} {{$productor["apellido"]}} </p>
                        <p class="h3 card-text text-uppercase text-center 2">Documento: {{$productor["documento"]}}</p>
                        <p class="h3 card-text text-uppercase text-center 2">Teléfono: {{$productor["telefono"]}}</p>
                        <p class="h3 card-text text-uppercase text-center 2">Correo: {{$productor["correo"]}}</p>
                        @foreach ($productor["fincas"] as $finca)
                            <p class="h3 card-text text-uppercase text-center 2">
                                Finca: 
                                <a 
                                    href="{{ url('/fincas?finca_id='.$finca['id']) }}"
                                    class="text-decoration-none link-opacity-10"
                                >
                                    {{$finca["nombre"]}}
                                </a>    
                            </p>
                        @endforeach
                            <p class="h3 card-text text-uppercase text-center 2"> Viveros </p>
                        @foreach ($productor["viveros"] as $vivero)
                            <p class="h3 card-text text-uppercase text-center 2"> {{$vivero["nombre"]}} </p>
                        @endforeach
                </x-cardData>
            </div>
        </div>
    @endforeach
</x-cardBody>