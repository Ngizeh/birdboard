@extends('layouts.app')

@section('content')

    <div class="container w-1/2 mx-auto mt-5">
        <div class="card py-8">
            <h3 class="py-6 text-2xl text-center">Let Create Something New</h3>
            <form action="/projects" method="post">
                @include('partials.form', ['buttonText' => 'Add Project'])
            </form>
        </div>
    </div>

@endsection
