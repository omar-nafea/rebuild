<x-layout :title="$PageTitle">  
    <div>
        <h1>Posts</h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <p>Writer: {{ $post->writer->name }}</p>
                    <p>Categories: {{ $post->categories->pluck('title')->implode(', ') }}</p>
                    <p>Comments: {{ $post->comments->count() }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
