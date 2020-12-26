@csrf
<div class="flex flex-col space-y-3">
    <label for="title" class="text-lg font-medium">Title</label>
    <input type="text"
           value="{{ $project->title }}"
           name="title"
           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2
           focus:ring-blue-400 focus:border-transparent @error('title') border-red-300 @enderror"
           required autocomplete="title">
    @error('title')
    <span class="text-red-500 mt-4" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="flex flex-col space-y-3">
    <label for="description" class="text-lg font-medium mt-3">Description</label>
    <textarea name="description"
              class="border h-24 border-gray-300 rounded py-2 focus:outline-none
              focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('description') border-red-300 @enderror"
    >{{ $project->description }}</textarea>
</div>
@error('description')
<span class="text-red-500 mt-4" role="alert">
        <strong>{{ $message }}</strong>
</span>
@enderror
<div class="flex mt-6 justify-between items-center">
    <button type="submit" class="bg-blue-400 rounded-lg py-3 px-4 text-white mr-2">
        {{ $buttonText }}
    </button>
    <a href="{{ route('projects.index') }}">Cancel</a>
</div>

