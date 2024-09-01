<div x-data="{ openActions: false, openFilters: false }" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <!-- Верхняя панель с поиском и фильтрами -->
    <div class="bg-white p-4">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-3 md:space-y-0 md:space-x-4">
            <!-- Поиск -->
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Поиск" wire:model.debounce.300ms="search">
                    </div>
                </form>
            </div>
            
            <!-- Кнопки действий -->
            <div class="flex items-center space-x-3">
                <button type="button" wire:click="$emit('openModal', 'create-employee')" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Добавить сотрудника
                </button>
                
                <!-- Фильтры -->
                <div class="relative">
                    <button @click="openFilters = !openFilters" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                        </svg>
                        Фильтры
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>

                    <!-- Выпадающее меню фильтров -->
                    <div x-show="openFilters" 
                         @click.away="openFilters = false"
                         x-transition:enter="transition ease-out duration-100" 
                         x-transition:enter-start="transform opacity-0 scale-95" 
                         x-transition:enter-end="transform opacity-100 scale-100" 
                         x-transition:leave="transition ease-in duration-75" 
                         x-transition:leave-start="transform opacity-100 scale-100" 
                         x-transition:leave-end="transform opacity-0 scale-95" 
                         class="absolute right-0 mt-2 p-4 bg-white border rounded-lg shadow-lg z-10 w-80">
                         <div class="space-y-4">
                            <div>
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900">Отдел</label>
                                <select id="department" wire:model="filters.department_id" @change="openFilters = false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Все отделы</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="position" class="block mb-2 text-sm font-medium text-gray-900">Должность</label>
                                <select id="position" wire:model="filters.position_id" @change="openFilters = false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Все должности</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900">Статус</label>
                                <select id="is_active" wire:model="filters.is_active" @change="openFilters = false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Все</option>
                                    <option value="1">Активные</option>
                                    <option value="0">Неактивные</option>
                                </select>
                            </div>
                            <div>
                                <label for="sed_praktika_access" class="block mb-2 text-sm font-medium text-gray-900">Доступ к СЭД Практика</label>
                                <select id="sed_praktika_access" wire:model="filters.sed_praktika_access" @change="openFilters = false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Все</option>
                                    <option value="1">Есть доступ</option>
                                    <option value="0">Нет доступа</option>
                                </select>
                            </div>
                            <div>
                                <label for="ep_access" class="block mb-2 text-sm font-medium text-gray-900">Электронная подпись</label>
                                <select id="ep_access" wire:model="filters.ep_access" @change="openFilters = false" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="">Все</option>
                                    <option value="1">Есть</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button wire:click="resetFilters" @click="openFilters = false" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                                Сбросить фильтры
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="openActions" class="z-10 absolute origin-top-right bg-white divide-y divide-gray-100 rounded shadow w-44">
        <ul class="py-1 text-sm text-gray-700" aria-labelledby="actionsDropdownButton">
            <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Mass Edit</a>
            </li>
        </ul>
        <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete all</a>
        </div>
    </div>
    <!-- Таблица с возможностью прокрутки -->
    <div class="flex-grow overflow-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <button wire:click="sortBy('last_name')" class="flex items-center">
                            ФИО
                            @if($sortField === 'last_name')
                                @if($sortDirection === 'asc')
                                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>
                                @else
                                    <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                    </svg>
                                @endif
                            @endif
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Должность
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Отдел
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Телефон
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Доступ к СЭД Практика
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Имеется электронная подпись
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Активность
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-{{ $employee->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="checkbox-table-search-{{ $employee->id }}" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                        <div class="flex flex-col">
                            <div class="text-base font-semibold">{{ $employee->last_name }} {{ $employee->first_name }}</div>
                            <div class="font-normal text-gray-500">{{ $employee->middle_name ?? '' }}</div>
                        </div>  
                    </th>
                    <td class="px-6 py-4">
                        {{ $employee->position->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee->department->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee->phone }}
                    </td>
                    <td class="px-6 py-4">
                        @if($employee->sed_praktika_access)
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Да
                            </div>
                        @else
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Нет
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($employee->ep_access)
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Да
                            </div>
                        @else
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Нет
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($employee->is_active)
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Работает
                            </div>
                        @else
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Уволен
                                <div>{{ $employee->termination_date }}</div>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <!-- Modal toggle -->
                        <a href="#" type="button" class="font-medium text-blue-600">Редактировать</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4">
        {{ $employees->links() }}
    </div> 
</div>
