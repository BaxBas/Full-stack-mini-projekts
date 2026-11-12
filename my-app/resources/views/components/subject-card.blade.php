@props(['subject'])

<div class="p-3 rounded-md ring-2 bg-white dark:bg-gray-800 dark:text-white ring-blue-600 dark:ring-blue-700">
    <div class="flex flex-row justify-between items-center">
        <h2 class="text-2xl font-bold">{{ $subject['nosaukums'] }}</h2>
        <div name="progress-bar" class="w-[90px]">
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-body mr-1">Progress:</span>
                <span class="text-sm font-medium text-body">{{ $subject['progress'] }}%</span>
            </div>
                <div class="w-full bg-red-200 rounded-full h-2">
                <div class="bg-green-500 h-2 rounded-full w-[{{ $subject['progress'] }}%]"></div>
            </div>
        </div>
    </div>

    <a href="/subjects/{{ $subject['id'] }}">
        <span class="inline-block bg-blue-600 text-white rounded-md hover:bg-blue-700 hover:text-white font-medium leading-5 rounded-base text-sm mt-1 px-3 py-2 transition ease-in-out duration-150">
            Apskatīt
        </span>
    </a>
</div>