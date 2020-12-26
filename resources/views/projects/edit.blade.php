@extends('layouts.app')

@section('content')

    <div class="container w-1/2 mx-auto mt-5">
        <div class="card py-8">
            <h3 class="py-6 text-2xl text-center">Edit the Project</h3>
            <form action="{{ route('projects.update', $project) }}" method="post">
                @method('PATCH')
                @include('partials.form', ['buttonText' => 'Update Project'])
            </form>
        </div>
    </div>

@endsection
