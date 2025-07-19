<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')

  <title>Rebuild {{ isset($title) ? " - " . $title : '' }}</title>
</head>

<body>
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company" class="h-8 w-auto" />
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav :active="request()->is('/')" href="/">Home</x-nav>
                <x-nav :active="request()->is('posts')" href="/posts">Posts</x-nav>
                <x-nav :active="request()->is('writers')" href="/writers">Writers</x-nav>
                <x-nav :active="request()->is('categories')" href="/categories">Categories</x-nav>
              </div>
            </div>
          </div>
        </div>
    </nav>

    @if(isset($title))
    <header class="bg-white shadow-sm">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title ?? "" }}</h1>
      </div>
    </header>
  @endif
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>

</html>