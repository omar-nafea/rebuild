<x-layout>
  <div class="my-4 bg-gray-100 text-black p-4 rounded-2xl flex gap-3">
    @foreach ($categories as $category)
      <div class="group relative inline-block ">
        <!-- The Shadow Layer -->
        <div class="absolute inset-0 rounded-lg bg-black"></div>
        <!-- The Anchor Tag styled as a Button -->
        <a href="{{ route('categories.show', $category) }}" class="
          relative block w-full
          transform
          rounded-lg
          border-2 border-black
          bg-white
          px-6 py-2
          text-xl font-bold text-black
          transition-transform duration-150 ease-in-out
          group-hover:translate-x-[4px]
          group-hover:translate-y-[-4px]
        ">
        {{ $category->title }}
        </a>
      </div>
    @endforeach
  </div>

  <div>
    @foreach ($posts as $post)
    <a href="{{ route('posts.show', $post) }}"
      class=" block my-4 w-full text-gray-50  hover:ring-2 ring-gray-900 hover:bg-gray-100 hover:shadow-2xl font-bold m-auto  bg-gray-900  hover:text-black transition-bg ease-in-out duration-250 rounded-2xl p-4 shadow-md">
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
  </div>
  <div>
    {{ $posts->links() }}
  </div>
</x-layout>