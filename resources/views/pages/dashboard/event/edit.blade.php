@extends('layouts.master')

@section('title', 'Edit Event')

@section('content')
    <div class="mx-auto sm:w-full">
        <div class="grid grid-cols-1 lg:grid-cols-1 sm:grid-cols-1 gap-4">
            <div class="w-full lg:p-8 sm:p-0">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="flex flex-wrap justify-between">
                        <h1 class="text-2xl font-bold">Edit Event</h1>
                        <a href="{{ url('/dashboard') }}">
                            <button>← Back</button>
                        </a>
                    </div>

                    @include('partials.alerts')
                    
                    <form class="max-w-lg py-5" method="POST" action="{{ route('event.update', $event->eventId) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title:</label>
                            <input type="text" value="{{ $event->name }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter event title" required />
                        </div>
                        <div class="mb-5">
                            <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline:</label>
                            <input type="datetime-local" value="{{ $event->deadline }}" name="deadline" id="deadline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>
                        <div class="mb-5">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                        
                            <fieldset class="flex flex-wrap gap-4">
                        
                                <div class="flex items-center mb-4">
                                    <input id="country-option-1" type="radio" name="status" value="Pending" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                                    {{ $event->status === 'Pending' ? 'checked' : '' }}>
                                    <label for="country-option-1" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Pending
                                    </label>
                                </div>
                        
                                <div class="flex items-center mb-4">
                                    <input id="country-option-2" type="radio" name="status" value="Ongoing" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                                    {{ $event->status === 'Ongoing' ? 'checked' : '' }}>
                                    <label for="country-option-2" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Ongoing
                                    </label>
                                </div>
                        
                                <div class="flex items-center mb-4">
                                    <input id="country-option-3" type="radio" name="status" value="Completed" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600" 
                                    {{ $event->status === 'Completed' ? 'checked' : '' }}>
                                    <label for="country-option-3" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Completed
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
