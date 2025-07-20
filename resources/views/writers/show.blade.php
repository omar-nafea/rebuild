<x-layout :title="$PageTitle">
    <div>
        <h1>{{ $writer->name }}</h1>
        <p>Number of Posts: {{ $writer->num_posts }}</p>
    </div>
    <form action="{{ route('writers.destroy', $writer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button style="cursor: pointer;" type="submit" class="bg-red-800">Delete</button>
    </form>
    <div>
        @foreach ($posts as $post )
        <div>
            <h1> Posts: </h1>
            <h2>{{ $post->title }}</h2>
        </div>
        @endforeach
    </div>
</x-layout>