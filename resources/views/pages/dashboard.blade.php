<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard.title') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Card Section -->
        <div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                    {{ __('dashboard.total_employees') }}
                    </p>
                </div>
        
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                    {{ $employeeCount }}
                    </h3>
                    <span class="flex items-center gap-x-1 text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                    <span class="inline-block text-sm">
                        1.7%
                    </span>
                    </span>
                </div>
                </div>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                    {{ __('dashboard.total_assets') }}
                    </p>
                </div>
        
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                    29.4%
                    </h3>
                </div>
                </div>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                    {{ __('dashboard.total_computers') }}
                    </p>
                </div>
        
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                    90
                    </h3>
                    <span class="flex items-center gap-x-1 text-red-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg>
                    <span class="inline-block text-sm">
                        1.7%
                    </span>
                    </span>
                </div>
                </div>
            </div>
            <!-- End Card -->
        
            <!-- Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500">
                    {{ __('dashboard.employees_with_signature') }}
                    </p>
                </div>
        
                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                    {{ $employeeHaveEP }}
                    </h3>
                </div>
                </div>
            </div>
            <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Section -->
    </div>
</x-app-layout>