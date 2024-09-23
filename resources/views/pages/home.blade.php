@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="mt-2 w-full bg-gray-50 p-6 rounded">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="w-full lg:p-8 sm:p-0 text-justify">
                <h1 class="font-bold text-3xl pb-4">About Event Timer App</h1>
                <p class="lg:text-2xl sm:text-base uppercase">Welcome to Event Timer App, a powerful web application designed to help you track and manage events with precision and ease. This platform offers real-time tracking, seamless user interactions, and efficient event management to keep you on top of your schedule.</p>
                <hr class="my-4">
                <h2 class="text-lg uppercase">Built using cutting-edge technologies, Event Timer App is crafted to deliver a fast, responsive, and user-friendly experience.</h2>
            </div>
            <div class="w-full lg:p-8 sm:p-0">
                <h1 class="font-bold text-base pb-4">Key Technologies Behind Event Timer App</h1>
                <ul class="list-disc">
                    <li>Laravel 11: Our application is built on Laravel 11, a robust and secure PHP framework known for its clean syntax and developer-friendly architecture. With Laravel's powerful features, we deliver a smooth and scalable backend experience.</li>
                    <li>Tailwind CSS: Tailwind CSS is the backbone of our design. It allows us to create a visually appealing, responsive, and modern user interface. Tailwind’s utility-first approach ensures that every aspect of our app's design is fine-tuned for efficiency and ease of use.</li>
                    <li>Livewire: Livewire is integrated to provide a seamless real-time experience without the need for complex JavaScript. It allows dynamic updates and interactions in the application, ensuring you stay updated without having to refresh your page.
                    </li>
                    <li>MariaDB: We use MariaDB as our primary database solution. Its powerful query capabilities and robust performance allow us to handle event data efficiently while maintaining data integrity and security.
                    </li>
                    <li>Docker: Our development and deployment process is streamlined using Docker. Docker enables us to package the entire application environment, ensuring consistent performance across all systems, whether in development or production.
                    </li>
                </ul>
            </div>
        </div>
    </div>  
@endsection