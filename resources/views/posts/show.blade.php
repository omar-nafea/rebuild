<x-layout :title="$PageTitle">
    <div>
        <h1>Title: {{ $post->title }}</h1>
        <p>content: {{ $post->content }}</p>
        <p>Status: {{ $post->isPublished ? 'Published' : 'Draft'}}</p>
        <p>Writer: {{ $post->writer->name }}</p>
    </div>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="cursor: pointer;" type="submit" class="bg-red-800">Delete</button>
    </form>
</x-layout>