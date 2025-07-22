<x-layout :title="$PageTitle">
  <form action="{{ route('posts.store') }}" method="post">
    @csrf
    @method('POST')
    <div class="space-y-12">
        <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-3">
            <input type="hidden" name="id" value="{{ $post->id ?? '' }}">
            <label for="title" class="block text-sm/6 font-bold text-gray-900">Title</label>
            <div class="mt-2">
              <input id="title" type="text" name="title" autocomplete="given-name" value="{{ old('title') }}"
                class="{{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('title')
        <span class="text-red-500 text-sm ">{{ $errors->first('title') }}</span>
      @enderror
          </div>
          

          <div class="sm:col-span-3">
            <label for="author_name" class="block text-sm/6 font-medium text-gray-900">Author</label>
            <div class="mt-2">
              {{-- 1. The VISIBLE input field for the user --}}
              {{-- Its name is changed to "author_name" to not conflict with the ID field --}}
              <input type="text" id="author_name" name="author_name" list="author-list"
                placeholder="Type or select an author" autocomplete="off"
                class="{{ $errors->has('writer_id') ? 'outline-red-500' : 'outline-gray-300' }} w-full rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">

              {{-- 2. The HIDDEN input field that will hold the selected author's ID --}}
              {{-- This is what you will use in your controller. Notice the name is "writer_id" --}}
              <input type="hidden" name="writer_id" id="author-id">

              <datalist id="author-list">
                @foreach ($writers as $writer)
          {{-- 3. The options now have the NAME as the value (for display) --}}
          {{-- and the ID is stored in a `data-id` attribute --}}
          <option data-id="{{ $writer->id }}" value="{{ $writer->name }}">
          @endforeach
              </datalist>
            </div>
            {{-- The error message now checks for 'writer_id' --}}
            @error('writer_id')
        <span class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
          </div>

          {{-- 4. Add this JavaScript to the bottom of your Blade file --}}
          <script>
            // Listen for input events on the visible text field
            document.getElementById('author_name').addEventListener('input', function (e) {
              let input = e.target,
                list = document.getElementById(input.getAttribute('list')),
                hiddenInput = document.getElementById('author-id'),
                inputValue = input.value;

              hiddenInput.value = ""; // Default to empty

              // Find the selected option in the datalist
              for (const option of list.options) {
                if (option.value === inputValue) {
                  // If a match is found, set the hidden input's value to the option's data-id
                  hiddenInput.value = option.getAttribute('data-id');
                  break;
                }
              }
            });
          </script>

          <div class="col-span-6">
            <label for="content" class="block text-sm/6 font-bold text-gray-900">Post content</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3"
                class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1  placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
            </div>
          </div>
        </div>
        @error('content')
      <span class="text-red-500 text-sm">{{ $errors->first('content') }}</span>
    @enderror
        <div class="my-4">
          <label for="category" class="block text-sm/6 font-bold text-gray-900">Category</label>
          <div class="mt-2 grid grid-cols-1">
            <select id="category" name="category" autocomplete="category-name"
              class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              <option value="1">Programming</option>
              <option value="2">Cyber Security</option>
              <option value="3">Linux</option>
              <option value="4">Computer Science</option>
            </select>
            <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
              class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
              <path
                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
          </div>
        </div>

      </div>

      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 space-y-10">
          <fieldset>
            <legend class="text-sm/6 font-lisght text-gray-900">Choose to Draft of to be Published</legend>
            <div class="mt-6 space-y-6">
              <div class="flex gap-3">
                <div class="flex h-6 shrink-0 items-center">
                  <div class="group grid size-4 grid-cols-1">
                    <input id="isPublished" type="checkbox" name="isPublished" checked
                      aria-describedby="isPublished-description"
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

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</x-layout>