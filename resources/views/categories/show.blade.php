<x-layout :title="$PageTitle">
    <div class="flex flex-col gap-4">
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
         
    </div>
</x-layout>
