<x-layout :title="$PageTitle">
  @foreach ($posts as $post)
    <a href="{{ route('posts.show', $post) }}"
    class="block my-4 w-full text-gray-50 hover:bg-gray-100 hover:shadow-2xl font-bold m-auto  bg-gray-900  hover:text-black transition-bg ease-in-out duration-250 rounded-2xl p-4 shadow-md">
    <div class="p-4">
      <h5 class="mb-2  text-xl font-semibold">
      {{ $post->title }}
      </h5>
      <p class=" leading-normal font-light">
      {{ $post->content }}
      </p>
    </div>
    </a>
  @endforeach
  </div>
</x-layout>