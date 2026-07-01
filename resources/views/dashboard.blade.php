<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                    <div class="mt-4 p-4 bg-gray-100 rounded-md border">
                        <h3 class="text-lg font-bold">Info Akses SIM Satpam:</h3>
                        <p class="mt-2">Role Anda: 
                            @if(auth()->user()->roles->count() > 0)
                                <span class="px-2 py-1 bg-blue-500 text-white rounded-md text-sm">
                                    {{ auth()->user()->roles->pluck('name')->join(', ') }}
                                </span>
                            @else
                                <span class="px-2 py-1 bg-gray-500 text-white rounded-md text-sm">Belum ada role</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
