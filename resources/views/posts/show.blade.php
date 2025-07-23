<x-layout :title="$PageTitle">
  <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-full">
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
  @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
  @endif
    <div class="p-4">
      <div class="flex justify-between">
        <h5 class="mb-2 text-slate-800 text-xl font-semibold">
          {{ $post->title }}
        </h5>
        <span class="mb-2 text-slate-700 text-xl ">
          {{ $post->writer->name }}
        </span>
      </div>
      <p class="text-slate-600 leading-normal font-light max-w-[80%]">
        {{ $post->content }}
      </p>
      <div class="flex justify-between items-center">
        @auth
      <div class="flex">
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button style="cursor: pointer;" type="submit"
          class="my-4 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs">Delete</button>
        </form>
        <!--  -->
        <a class="block m-4 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs"
        href="{{ route('posts.edit', $post) }}">Edit</a>
      </div>
    @endauth
        <p class="text-blue-900">
          -- {{ $post->isPublished ? 'Published' : 'Draft'}}
        </p>



      </div>
      @if(isset($comments) && $comments->count())
      <div class="my-6">
      <h3 class="font-semibold text-gray-900 mb-2">Comments</h3>
      @foreach($comments as $comment)
      <div class="mb-2 p-2 border rounded bg-gray-50">
      <div class="text-sm text-gray-700">{{ $comment->content }}</div>
      <div class="text-md text-gray-900 italic">by {{ $comment->author }} &middot;
      {{ $comment->created_at->diffForHumans() }}
      </div>
      </div>
    @endforeach
      </div>
    @endif
      <form action="{{ route('comments.store') }}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <h2 class="my-4 font-semibold text-gray-900 capitalize">Add your Comment</h2>
        <label for="content" class="block text-sm/6 font-bold text-gray-900">Comment</label>
        <div class="mt-2 flex items-center justify-between">
          <input id="content" type="text" name="content"
            class=" outline-gray-300 block w-[100%] mr-4 rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        
        <div class="mt-2 display-none">
          <input id="author" type="hidden" name="author" value="{{ auth()->user()->name }}"
            class=" outline-gray-300 display-none rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
          <button type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Comment</button>
            </div>
    </div>
    </form>
  </div>
  </div>
</x-layout>