<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Job Board</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
        <nav class="mb-4 flex justify-between  font-medium">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{route('jobs.index')}}">Home</a>
                </li>
            </ul>
            <ul class="flex space-x-2">
                @auth
                    <li>
                        <a href="{{route('my-job-application.index')}}">
                            {{-- {{auth()->user()->name}} --}}
                            My applications
                        </a>
                    </li>
                    <li>
                        <a href="{{route('my-job.index')}}">
                            My jobs
                        </a>
                    </li>
                    <li>
                        <form action="{{route('auth.destroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{route('auth.create')}}">Login</a>
                    </li>
                @endauth
            </ul>
        </nav>
        @if (session('success'))
            <div role="alert" class="my-8 rounded-md border-1-4 border-green-400 bg-green-200 text-green-700 p-4 opacity-75">
                <p class="font-bold">Success!</p>
                <p>{{session('success')}}</p>

            </div>
        @endif
        @if (session('error'))
            <div role="alert" class="my-8 rounded-md border-1-4 border-red-400 bg-red-200 text-red-700 p-4 opacity-75">
                <p class="font-bold">Error!</p>
                <p>{{session('error')}}</p>

            </div>
        @endif
        {{$slot}}
    </body>
</html>
