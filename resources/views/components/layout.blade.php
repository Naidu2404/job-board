<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 text-slate-700">
        <nav class="mb-8 flex font-medium text-lg justify-between">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{ route('jobs.index') }}">Home</a>
                </li>
            </ul>
            <ul class="flex space-x-2">
                {{-- checking whether we are logged in or not --}}
                @auth
                    <li>
                        <a href="{{ route('my-job-applications.index')}}">
                            {{ auth()->user()->name ?? 'Anonymus' }} : Applications
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('my-jobs.index') }}">My Jobs</a>
                    </li>
                    <li>
                        <form action="{{ route('auth.destroy')}}" method="POST">
                            @csrf
                            {{-- overriding the method to delete this is called methodm spoofing --}}
                            @method('DELETE')
                            <button>Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.create') }}">Sign in</a>
                    </li>
                @endauth
            </ul>
        </nav>

        {{-- to display flash messages --}}
        @if (session('success'))
            <div role="alert" class="my-8 rounded-md border-l-4 border-green-300 text-green-700 bg-green-100 p-4 opacity-75">
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 text-red-700 bg-red-100 p-4 opacity-75">
                <p class="font-bold">Error!</p>
                <p>{{ session('error') }}</p>
            </div>
        @endif


        {{-- we use slots to put data into the layout {{ $slot }} --}}
        {{ $slot }}
    </body>
</html>