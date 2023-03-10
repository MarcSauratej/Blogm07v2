<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="itempost">
        @foreach ($posts as $post )
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
                <img class="rounded-t-lg" src="/storage/{{$post->image_url}}" alt="imagen" />
            </div>
            <div class="p-5">
                <a href="#">
                    <a href="{{route('posts.view',$post->id)}}"class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</a>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->created_at}}</p>

                @foreach ($post->tags as $tag)
                         <h4><span class="badge badge-info">{{ $tag->tag }}</span></h4>
                      @endforeach
            </div>

        </div>
        @endforeach
    </div>
</x-app-layout>
