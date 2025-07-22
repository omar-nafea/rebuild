<x-layout :title="$PageTitle">
  <div class="flex flex-col gap-3">
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
  @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
  @endif
    @foreach ($categories as $category)
    <div class="group relative inline-block">
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
              text-2xl font-bold text-black
              transition-transform duration-150 ease-in-out
              group-hover:translate-x-[4px]
              group-hover:translate-y-[-4px]
            ">
      {{ $category->title }}
      </a>
    </div>
  @endforeach
  </div>

</x-layout>