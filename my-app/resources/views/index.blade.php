<x-layout>
    <h1 class="text-3xl font-bold dark:text-white">Visi priekšmeti</h1>
    <div name="card-container" class="space-y-4">
        @foreach ($subjects as $subject)
            <x-subject-card :subject="$subject" />
        @endforeach
    </div>

    {{ $subjects->links() }}
</x-layout>