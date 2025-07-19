<x-layout :title="$PageTitle">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($writers as $writer)
        <div class="overflow-hidden rounded-lg bg-white shadow">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900">{{ $writer->name }}</h3>
            </div>
        </div>
        @endforeach
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>