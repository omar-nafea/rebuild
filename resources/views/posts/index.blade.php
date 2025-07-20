<x-layout :title="$PageTitle">
    <div>
        <h1>Posts</h1>
        <!-- TODO write success message if exist -->
        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
        @endif
        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center my-4 justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Create New Post
        </a>
        <div class="grid grid-cols-1 gap-4 ">
            @if ($posts->isEmpty())
            <div class="col-span-full text-center p-6">
                <p class="text-gray-500">No posts found. Please create a new post.</p>
            </div>
            @endif
            @foreach ($posts as $post)
            <a href="{{ route('posts.show', $post) }}" class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">
                    <h1 class="text-2xl font-medium text-gray-900">{{ $post->title }}</h1>
                    <p>{{ $post->content }}</p>
                    <p>Status: {{ $post->isPublished ? 'Published' : 'Draft'}}</p>
                    <p class="text-lg font-medium text-gray-900">Writer: {{ $post->writer->name }}</p>
                </div>
            </a>
            @endforeach
        </div>
</x-layout>