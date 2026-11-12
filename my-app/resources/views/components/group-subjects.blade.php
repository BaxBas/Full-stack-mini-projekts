<x-layout>
    <div class="p-4 rounded-md ring-2 bg-white dark:bg-gray-800 dark:text-white ring-blue-600/50">
        <div class="flex flex-row justify-between items-center mb-4">
            <h1 class="text-2xl md:text-3xl font-bold">{{ $group->nosaukums }} priekšmeti</h1>
                <div class="flex flex-row gap-2 items-top mb-auto">
                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center cursor-pointer bg-red-500 rounded-md text-white hover:bg-red-600 font-medium leading-5 rounded-base text-sm p-3">
                    <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M166.2-16c-13.3 0-25.3 8.3-30 20.8L120 48 24 48C10.7 48 0 58.7 0 72S10.7 96 24 96l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-96 0-16.2-43.2C307.1-7.7 295.2-16 281.8-16L166.2-16zM32 144l0 304c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-304-48 0 0 304c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16l0-304-48 0zm160 72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176zm112 0c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176z"/>
                    </svg>
                </button>
            </form>
            <a href="{{ route('groups.edit', $group->id) }}" class="flex items-center cursor-pointer bg-orange-400 rounded-md text-white hover:bg-orange-500 font-medium leading-5 rounded-base text-sm p-3">
                <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L368 46.1 465.9 144 490.3 119.6c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L432 177.9 334.1 80 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                </svg>
            </a>
            </div>
        </div>

        <div name="card-container" class="space-y-4">
            @foreach ($subjects as $subject)
                <x-subject-card :subject="$subject" />
            @endforeach
        </div>

        {{ $subjects->links() }}
    </div>
</x-layout>