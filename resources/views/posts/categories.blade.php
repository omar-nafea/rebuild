<x-layout>
    <div class="flex gap-2">
        @forEach($categories as $category)
            <div>{{ $category->title }} </div>
        @endforeach
    </div>
</x-layout>
