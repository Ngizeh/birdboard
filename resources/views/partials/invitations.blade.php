<div class="card mt-6">
    <div class="border-l-4 border-blue-300 -ml-5 py-3">
        <p class="font-normal text-xl py-4 ml-6">
            Invite User
        </p>
    </div>
    <div class="text-right">
        <form action="{{ $project->path() . '/invitations' }}" method="post" class="mt-4">
            @csrf
            <input type="text"
                   name="email"
                   class="border border-gray-300 rounded py-2 w-full pl-6
                                   focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('email') border-red-300 @enderror"
                   autocomplete="email"
                   placeholder="Enter email address"
            >
            <button type="submit" class="bg-blue-400 mt-4 py-2 px-6 font-bold text-white rounded">Invite</button>
        </form>

        @if ($errors->invitations->any())
            <div class="text-red-500 mt-5">
                <ul>
                    @foreach ($errors->invitations->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
