<img 
    src="{{URL::asset('images/'.$url.'.webp')}}" 
    class="card-img-top" 
    alt="$url"
>
<div class="card-body pt-2 pb-2">
    {{$slot}}
</div>