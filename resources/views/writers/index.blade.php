<x-layout :title="$PageTitle">
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
    @endif
    <a href="{{ route('writers.create') }}"
        class="inline-flex items-center my-4 justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Create New Writer
    </a>
    <div class="grid grid-cols-1 gap-4 ">
        @if ($writers->isEmpty())
        <div class="col-span-full text-center p-6">
            <p class="text-gray-500">No writers found. Please create a new writer.</p>
        </div>
        @endif
        <!-- TODO: write success message -->
        @foreach ($writers as $writer)
        <a href="{{ route('writers.show', $writer) }}" class="overflow-hidden rounded-lg bg-white shadow">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900">{{ $writer->name }}</h3>
                <p>Number of Posts: {{ $writer->num_posts }}</p>
            </div>
        </a>
        @endforeach
        <div class="mt-4">
            {{ $writers->links() }}
        </div>
    </div>
</x-layout>