@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="mx-auto sm:w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 sm:grid-cols-1 gap-4">
            <div class="w-full lg:p-8 sm:p-0">
                <div class="bg-gray-50 rounded-lg p-4">
                                   
                    {{-- @include('partials.alerts', ['status' => session('status'), 'message' => session('message')]) --}}
                    @include('partials.alerts')

                    <form class="max-w-lg py-5" method="POST" action="{{ url('/add') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title:</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter event title" required />
                        </div>
                        <div class="mb-5">
                            <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline:</label>
                            <input type="datetime-local" name="deadline" id="deadline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
            <div class="w-full lg:p-8 sm:p-0">
                <div class="grid grid-cols-1 lg:grid-cols-2 sm:grid-cols-1 gap-4">
                    @if ($events->count() > 0)
                        @foreach ($events as $event)
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex justify-between">
                                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $event->name }}</h5>

                                    <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 11h6v1h-7v-9h1v8z"/>
                                    </svg>
                                </div>
                                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                    Deadline: {{ $event->deadline }}
                                </p>
                                <p class="mb-3 font-normal text-red-500 dark:text-red-400">
                                    Remaining Time: {{ \Carbon\Carbon::parse($event->deadline)->diffForHumans() }}
                                    {{ \Carbon\Carbon::now()->diffInHours(\Carbon\Carbon::parse($event->deadline)) % 24 }} hours, and 
                                    {{ \Carbon\Carbon::now()->diffInMinutes(\Carbon\Carbon::parse($event->deadline)) % 60 }} minutes
                                </p>
                                <div class="flex justify-between">
                                    @include('partials.badges', ['status' => $event->status])
                                    <div class="flex gap-4">
                                        <span>
                                            <a href="/dashboard/event?={{ $event->eventId }}"><button id="btn-edit" data-id="{{ $event->eventId }}">Edit</button></a>
                                        </span>
                                        <span>
                                            <button id="btn-delete" data-id="{{ $event->eventId }}">Delete</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-2xl bold italic">No event/s added</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
