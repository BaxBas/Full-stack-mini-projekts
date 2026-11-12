<x-layout>
    <div class="p-4 rounded-md ring-2 bg-white dark:bg-gray-800 dark:text-white ring-blue-600/50">
        <div class="flex flex-row justify-between">
            <div class="flex flex-col gap-2">
                <h1 class="text-3xl font-bold">{{ $subject->nosaukums }}</h2>

                <div name="progress-bar" class="w-[90px]">
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-body mr-1">Progress:</span>
                        <span class="text-sm font-medium text-body">{{ $subject->progress }}%</span>
                    </div>
                        <div class="w-full bg-red-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full w-[{{ $subject->progress }}%]"></div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-2 items-top mb-auto">
                <a href="{{ route('subjects.edit', $subject->id) }}" class="flex items-center cursor-pointer bg-orange-400 rounded-md text-white hover:bg-orange-500 font-medium leading-5 rounded-base text-sm p-3">
                    <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L368 46.1 465.9 144 490.3 119.6c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L432 177.9 334.1 80 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                    </svg>
                </a>
                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center cursor-pointer bg-red-500 rounded-md text-white hover:bg-red-600 font-medium leading-5 rounded-base text-sm p-3">
                        <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M166.2-16c-13.3 0-25.3 8.3-30 20.8L120 48 24 48C10.7 48 0 58.7 0 72S10.7 96 24 96l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-96 0-16.2-43.2C307.1-7.7 295.2-16 281.8-16L166.2-16zM32 144l0 304c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-304-48 0 0 304c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16l0-304-48 0zm160 72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176zm112 0c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="h-1 bg-blue-700/30 rounded-full my-4 dark:bg-blue-500/50"></div>

        <h2 class="text-2xl font-bold mb-2">Grupa</h2>
        <p>{{ $subject->group?->nosaukums ?? 'Bez grupas' }}</p> {{-- ?-> pārbauda vai ir null --}}

        <div class="h-1 bg-blue-700/30 rounded-full my-4 dark:bg-blue-500/50"></div>

        <div class=" flex flex-row justify-between items-center mb-2">
            <h2 class="text-2xl font-bold">Atzīmes</h2>

            <div class="flex gap-2">
                <a href="{{ route('grades.create', $subject->id) }}" class="flex items-center cursor-pointer bg-green-500 rounded-md text-white hover:bg-green-600 font-medium leading-5 rounded-base text-sm p-3">
                    <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z"/>
                    </svg>
                </a>
                <a href="{{ route('grades.edit', $subject->id) }}" class="flex items-center cursor-pointer bg-orange-400 rounded-md text-white hover:bg-orange-500 font-medium leading-5 rounded-base text-sm p-3">
                    <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L368 46.1 465.9 144 490.3 119.6c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L432 177.9 334.1 80 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                    </svg>
                </a>
            </div>
        </div>
        
        <div class="flex flex-col justify-between md:items-center my-4 md:flex-row">
            <div class="md:w-1/2">
                <p><span class="font-medium">Pārbaudījumi kopā:</span> {{ $subject->grades->count() }}</p>
                <p><span class="font-medium">Jau iegūtas atzīmes:</span> {{ $subject->grades->filter(fn($grade) => $grade->ieguts != 0)->count() }}</p>
            </div>
            <div class="h-1 w-3xs md:w-1 md:h-10 my-1 bg-blue-700/30 rounded-full dark:bg-blue-500/50"></div>
            <div class="md:w-1/2 md:text-right">
                <p><span class="font-medium">Kopējā vidējā atzīme (bez svara):</span> {{ round($subject->grades->avg('ieguts'),2) }}</p>
                <p><span class="font-medium">Kopējā vidējā atzīme (ar svaru):</span> {{ $subject->weighted_avg }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto border border-slate-200 dark:border-neutral-500 rounded-md overflow-x-auto">
            <table class="w-full">
                <thead
                    class="text-slate-900 dark:text-slate-50 text-left text-sm font-semibold border-b border-slate-200 dark:border-neutral-500 whitespace-nowrap">
                    <tr>
                    <th scope="col" class="px-4 py-3.5 text-center odd:bg-blue-50 dark:odd:bg-blue-700/20">Tēma</th>
                    <th scope="col" class="px-4 py-3.5 text-center odd:bg-blue-50 dark:odd:bg-blue-700/20">Atzīme</th>
                    <th scope="col" class="px-4 py-3.5 text-center odd:bg-blue-50 dark:odd:bg-blue-700/20">Svars</th>
                    <th scope="col" class="px-4 py-3.5 odd:bg-blue-50 dark:odd:bg-blue-500/50"></th>
                    </tr>
                </thead>

                <tbody class="text-sm">
                    @foreach ($subject->grades as $grade)
                        <tr>
                            <td class="px-4 py-4 font-medium dark:text-slate-50 odd:bg-blue-50 dark:odd:bg-blue-700/20">{{ $grade->nosaukums }}</td>
                            <td class="px-4 py-4 text-center dark:text-slate-400 odd:bg-blue-50 dark:odd:bg-blue-700/20"> {{ $grade->ieguts ? $grade->ieguts : '–' }}</td>
                            <td class="px-4 py-4 text-center dark:text-slate-400 odd:bg-blue-50 dark:odd:bg-blue-700/20">{{ $grade->svars }}</td>
                            <td class="px-4 py-4 text-center dark:text-slate-400 odd:bg-blue-50 dark:odd:bg-blue-700/20">
                                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center cursor-pointer bg-red-500 rounded-md text-white hover:bg-red-600 font-medium leading-5 rounded-base text-sm p-3 mx-auto">
                                        <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path d="M166.2-16c-13.3 0-25.3 8.3-30 20.8L120 48 24 48C10.7 48 0 58.7 0 72S10.7 96 24 96l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-96 0-16.2-43.2C307.1-7.7 295.2-16 281.8-16L166.2-16zM32 144l0 304c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-304-48 0 0 304c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16l0-304-48 0zm160 72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176zm112 0c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>