@extends('layouts.app')

@section('content')
    <div class="container w-1/2 mx-auto mt-6">
        <div class="card p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-center text-2xl font-bold">Register</h2>
                <div class="flex flex-col space-y-2">
                    <label class="text-gray-700 font-medium" for="email">Name</label>
                    <input type="text" name="name"
                           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent  @error('name') border-red-300 @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="text-red-300" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="text-gray-700 font-medium" for="email">Email Address</label>
                    <input type="text" name="email"
                           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent  @error('email') border-red-300 @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="text-red-300" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-2 mt-4">
                    <label class="text-gray-700 font-medium" for="password">Password</label>
                    <input type="password" name="password"
                           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent @error('password') border-red-300 @enderror" name="password"
                           value="{{ old('password') }}" required autocomplete="password" autofocus>
                    @error('password')
                    <span class="text-red-300" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-2 mt-4">
                    <label class="text-gray-700 font-medium" for="password">Confirm Password</label>
                    <input type="password" name="password"
                           class="border border-gray-300 rounded py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent" name="password_confirmation" required autocomplete="new-password" autofocus>
                </div>
                <div class="flex items-center my-3">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <p class="pl-4">Remember Me</p>
                </div>
                <button class="bg-blue-400 rounded text-white py-3 px-6 mr-2" type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
