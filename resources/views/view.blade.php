@include('layouts.master')
<div class="container2" >
    <div class="bg-white border border-gray-200 rounded-lg" style="display: flex;align-items: center;gap: 100px;">
        <div class="image">
            @if($post->image_url)
            <img class="rounded-t-lg" src="/storage/{{$post->image_url}}" alt="imagen" />
            @else
            <img alt="No hay imagen">
            @endif
        </div>
        <div class="p-5">

            <h1 class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{$post->title}}
            </h1>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-500">ID del Post: {{$post->id}}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-500">{{$post->body}}</p>
        </div>
        @foreach ($post->tags as $tag)
            <h4><span class="tag">{{ $tag->tag }}</span></h4>
        @endforeach
    </div>
</div>
<!-- iria el modal comment para poner los comentarios pero no funciona -->
