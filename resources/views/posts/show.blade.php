<x-layout :title="$PageTitle">
  <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-full">
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
        <p class="text-gray-900 font-light">
          {{ $post->isPublished ? 'Published' : 'Draft'}}
        </p>
      </div>
    </div>
  </div>
</x-layout>