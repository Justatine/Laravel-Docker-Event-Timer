@extends('layouts.app')

@section('title', 'Post CRUD App')

@section('content')
    @if (isset($isOpen) && $isOpen)
        @include('livewire.post')
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @include('partials.alerts')
        <div class="flex flex-wrap justify-between text-gray-700 uppercase p-2">
            <h1 class="text-2xl font-semibold">Manage Posts</h1>
            <button wire:click="create()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+ Add</button>
        </div>
        <hr class="p-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Content</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="lg:w-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->title }}
                        </th>
                        <td class="px-6 py-4 lg:w-1/2">
                            {{ $item->content }}
                        </td>
                        <td class="px-6 py-4 w-1">
                            <div class="flex flex-wrap justify-between">
                                <a wire:click="edit({{ $item->id }})" class="font-medium cursor-pointer text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a wire:click="delete({{ $item->id }})" class="font-medium cursor-pointer text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection