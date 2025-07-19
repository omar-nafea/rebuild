<x-layout :title="$PageTitle">  
    <div>
        <h1>{{ $writer->name }}</h1>
        <p>Number of Posts: {{ $writer->num_posts }}</p>
    </div>
</x-layout>