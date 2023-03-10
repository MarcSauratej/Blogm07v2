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
            <h4><span class="badge badge-info">{{ $tag->tag }}</span></h4>
        @endforeach
    </div>
</div>

<button data-modal-target="defaultModal" data-modal-toggle="defaultModalComment" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Nuevo Comment
</button>

<div id="defaultModalComment" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <form action="{{ route('comment.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="relative w-full h-full max-w-2xl md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Aqui puedes crear un nuevo Comment
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6">
                <div class="mb-6">
                 <div class="mb-6">
                    <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your comment</label>
                    <input type="comment" id="comment" name="comment" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                  </div>
                  <div class="mb-6">
                    <label for="post_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Id Post</label>
                    <input type="post_id" id="post_id" name="post_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                  </div>
            </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
                  <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cerrar</button>
              </div>
          </div>
      </div>
    </form>
  </div>
</div>
 <!-- Iria la caja de comments pero peta XD-->
