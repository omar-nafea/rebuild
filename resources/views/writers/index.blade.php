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
      Create New Writer
    </a>
    <div class="grid grid-cols-1 gap-4 ">
      @if ($writers->isEmpty())
      <div class="col-span-full text-center p-6">
      <p class="text-gray-500">No posts found. Please create a new post.</p>
      </div>
    @endif
      @foreach ($writers as $writer)
      <a href="{{ route('writers.show', $writer) }}" class="w-full text-gray-50 hover:bg-gray-100 hover:shadow-2xl font-bold m-auto  bg-gray-900  hover:text-black transition-bg ease-in-out duration-250 rounded-2xl p-4 shadow-md">
      <div class="p-4">
        <h5 class="mb-2  text-xl font-semibold">
          {{ $writer->name }}
        </h5>
        
          <p class=" grid-end leading-normal font-light">
            Number of Posts: {{ $writer->num_posts}}
          </p>
      </div>
      </a>
    @endforeach
    <div>
      {{ $writers->links() }}
    </div>
    </div>
</x-layout>