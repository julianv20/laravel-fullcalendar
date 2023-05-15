@extends('layouts.app')

@section('contenido')

<div class="flex flex-col items-center justify-center bg-gray-400 pt-16 pb-7">
    <div class="bg-white p-5 rounded">
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of </label>
                <input type="text" name="title"  value="{{ $event->title }}" require  class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start date</label>
                <input type="datetime-local" name="start_date"  value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}" required  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End date</label>
                <input type="datetime-local" name="end_date"  value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}" required  class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <button type="submit" class="            
                flex
                mt-4
                items-center
                justify-center
                focus:outline-none
                text-white text-sm
                sm:text-base
                bg-blue-700
                hover:bg-blue-800
                rounded-2xl
                py-2
                w-full
                transition
                duration-150
                ease-in"  >Edit Event</button>              
            </div>

        </form>
    </div>
</div>    

@endsection



{{-- <dir>
    <form action="/events/{{ $event->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ $event->title }}" required>
        </div>

        <div>
            <label for="start_date">Start Date:</label>
            <input type="datetime-local" name="start_date" value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}" required>
        </div>

        <div>
            <label for="end_date">End Date:</label>
            <input type="datetime-local" name="end_date" value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}" required>
        </div>

        <button type="submit">Update Event</button>
    </form>
</dir> --}}