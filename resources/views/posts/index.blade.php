<x-layout :title="$PageTitle">
  <div class="flex flex-col">
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
  @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
  @endif
    <a href="{{ route('posts.create') }}"
      class="inline-flex items-center w-[25%] my-4 justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      Create New Post
    </a>
    <div class="grid grid-cols-1 gap-4 ">
      @if ($posts->isEmpty())
      <div class="col-span-full text-center p-6">
      <p class="text-gray-500">No posts found. Please create a new post.</p>
      </div>
    @endif
      @foreach ($posts as $post)
      <a href="{{ route('posts.show', $post) }}" class="w-full text-gray-50 hover:bg-gray-100 hover:shadow-2xl font-bold m-auto  bg-gray-900  hover:text-black transition-bg ease-in-out duration-250 rounded-2xl p-4 shadow-md">
      <div class="p-4">
        <div class="flex justify-between">
        <h5 class="mb-2  text-xl font-semibold">
          {{ $post->title }}
        </h5>
        <span class="mb-2  text-xl ">
          {{ $post->writer->name }}
        </span>
        </div>
        <div class="flex justify-between">
          <p class=" leading-normal font-light">
            {{ $post->content }}
          </p>
          <p class=" grid-end leading-normal font-light">
            {{ $post->isPublished ? 'Published' : 'Draft'}}
          </p>
        </div>
      </div>
      </a>
    @endforeach
    <div>
      {{ $posts->links() }}
    </div>
    </div>
</x-layout>