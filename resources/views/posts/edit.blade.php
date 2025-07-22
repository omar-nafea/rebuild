<x-layout :title="$PageTitle">
  <form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900 capitalize">create new post</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <input type="hidden" name="id" value="{{ $post->id ?? '' }}">
            <label for="title" class="block text-sm/6 font-bold text-gray-900">Title</label>
            <div class="mt-2">
              <input id="title" type="text" name="title" autocomplete="given-name"
                value="{{ old('title', $post->title) }}"
                class="{{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
          </div>
          @error('title')
          <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
          @enderror

          <div class="sm:col-span-3">
            <label for="writer_id" class="block text-sm/6 font-bold text-gray-900">Author</label>
            <div class="mt-2">
              <input id="writer_id" value="{{  old('writer_id', $post->writer_id)  }}" type="text" name="writer_id" autocomplete="family-name"
                class="{{ $errors->has('writer_id') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
          </div>
          @error('writer_id')
          <span class="text-red-500 text-sm">{{ $errors->first('writer_id') }}</span>
          @enderror

          <div class="col-span-6">
            <label for="content" class="block text-sm/6 font-bold text-gray-900">Post content</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3" class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content', $post->content) }}</textarea>
            </div>
          </div>
        </div>
      </div>
      @error('content')
      <span class="text-red-500 text-sm">{{ $errors->first('content') }}</span>
      @enderror
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 space-y-10">
          <fieldset>
            <legend class="text-sm/6 font-semibold text-gray-900">By content</legend>
            <div class="mt-6 space-y-6">
              <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                  <div class="group grid size-4 grid-cols-1">
                    <input id="isPublished" type="checkbox" name="isPublished" checked aria-describedby="isPublished-description"
                      class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                    <svg viewBox="0 0 14 14" fill="none"
                      class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                      <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="opacity-0 group-has-checked:opacity-100" />
                      <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="opacity-0 group-has-indeterminate:opacity-100" />
                    </svg>
                  </div>
                </div>
                <div class="text-sm/6">
                  <label for="isPublished" class="font-bold text-gray-900">isPublished</label>
                  <p id="isPublished-description" class="text-gray-500">Get notified when someones posts
                    a comment on a posting.</p>
                </div>
              </div>
            </div>
          </fieldset>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</x-layout>
