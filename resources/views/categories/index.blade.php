<x-layout :title="$PageTitle">
  @foreach ($categories as $category)
    <a href="{{ route('categories.show', $category) }}" class="bg-white p-4 rounded-lg shadow-md m-2">
      {{ $category->title }}
    </a>
  
  @endforeach

</x-layout>