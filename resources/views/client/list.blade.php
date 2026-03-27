@extends('components.layout')

@section('content')
<main class="mt-20 px-6 flex flex-col items-center relative">
    
    @if(session('success'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 4000)" 
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-[-20px]"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed top-10 right-10 z-50"
        >
            <div class="bg-emerald-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 border border-emerald-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-bold tracking-wide text-sm">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="w-full max-w-2xl">
        <div class="flex items-center justify-between mb-8 border-b border-gray-200">
            <div class="flex gap-4">
                <a href="{{ route('client.index') }}" 
                   class="pb-4 px-2 text-sm font-bold uppercase tracking-wider transition-colors {{ !request('status') ? 'border-b-2 border-indigo-600 text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                    All Clients
                </a>
                
                <a href="{{ route('client.index', ['status' => 'active']) }}" 
                   class="pb-4 px-2 text-sm font-bold uppercase tracking-wider transition-colors {{ request('status') === 'active' ? 'border-b-2 border-indigo-600 text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Active Clients
                </a>

                <a href="{{ route('client.index', ['status' => 'inactive']) }}" 
                   class="pb-4 px-2 text-sm font-bold uppercase tracking-wider transition-colors {{ request('status') === 'inactive' ? 'border-b-2 border-indigo-600 text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Inactive Clients
                </a>
            </div>

            <a href="{{ route('client.create') }}" class="mb-4 inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold py-2 px-4 rounded-lg transition-all shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                ADD CLIENT
            </a>
        </div>
        
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
            <div class="max-h-[500px] overflow-y-auto"> 
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-600 text-xs uppercase sticky top-0 z-10 shadow-sm"> 
                        <tr>
                            <th class="px-6 py-4 font-bold bg-gray-50">Client Name</th> 
                            <th class="px-6 py-4 font-bold text-right bg-gray-50">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($Clients as $client)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold text-gray-900">{{ $client->name }}</span>
                                        <span class="text-[10px] px-2 py-0.5 rounded font-bold uppercase {{ $client->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $client->status }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-gray-400">{{ $client->email }}</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('client.edit', $client) }}" class="text-indigo-600 font-bold text-sm hover:underline">Edit</a>
                                    
                                    <form action="{{ route('client.delete', $client) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this client? This cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 font-bold text-sm hover:underline ml-4">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-10 text-center text-gray-400 font-medium">No clients found matching this filter.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection