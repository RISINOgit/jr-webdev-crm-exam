@extends('components.layout')

@section('content')
<main class="mt-20 px-6 flex flex-col items-center">
    
    <div class="w-full max-w-lg">
        <a href="{{ route('client.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-indigo-600 text-xs font-bold uppercase tracking-widest mb-6 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to List
        </a>

        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-8">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit Client</h1>
            <p class="text-sm text-gray-500 mb-8">Update the details for <strong>{{ $client->name }}</strong>.</p>

            <form action="{{ route('client.update', $client->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <div>
                    <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Full Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $client->name) }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-gray-900" 
                           required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email Address</label>
                    <input type="email" name="email" id="email" 
                           value="{{ old('email', $client->email) }}" 
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-gray-900" 
                           required>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="status" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Client Status</label>
                    <select name="status" id="status" 
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all text-gray-900 bg-white">
                        <option value="active" {{ old('status', $client->status) === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $client->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-lg transition-all shadow-md transform hover:-translate-y-0.5 active:scale-95">
                        SAVE CHANGES
                    </button>
                    
                    <a href="{{ route('client.index') }}" class="text-center text-sm font-semibold text-gray-400 hover:text-gray-600 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection