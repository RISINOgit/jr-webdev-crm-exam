@extends('components.layout')

@section('content')
    <main class="mt-20">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200 max-w-lg w-full">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Welcome back, {{ Auth::user()->name ?? 'User' }}!
                </h1>
                
                <div class="mt-6">
                    <a href="{{ route('client.index') }}" 
                    class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition font-medium">
                        View Clients
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection