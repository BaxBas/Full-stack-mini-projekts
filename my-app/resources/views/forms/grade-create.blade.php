<x-layout>
    @php
        $isEdit = isset($grades);
        $oldGrades = old('grades', [[]]);
    @endphp
    <form action="{{ $isEdit ? route('grades.update', $subject_id) : route('grades.store') }}" method="POST"  class="max-w-md mx-auto dark:text-white">
        @csrf 
        {{-- pasargā no csrf uzbrukumiem --}}
        @if($isEdit)
            @method('PUT')
        @endisset

        <div class="flex flex-row justify-between items-center mb-5">
            @if($isEdit)
                <h1 class="text-3xl font-bold">Atzīmju rediģēšana</h1>
            @else
                <h1 class="text-3xl font-bold">Atzīmju izveide</h1>
                <button type="button" id="add-grade" class="flex items-center cursor-pointer bg-green-500 rounded-md text-white hover:bg-green-600 font-medium leading-5 rounded-base text-sm p-3">
                    <svg class="h-4 w-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z"/>
                    </svg>
                </button>
            @endif
        </div>

        <div id="grades-container" class="flex flex-col mt-2 mb-2 gap-2">
            @if ($isEdit)
                {{-- rediģēšana: indekss ir atzīmes id, lai kontrolieris zina, kuru ierakstu atjaunot --}}
                @foreach ($grades as $grade)
                    @include('components.grade-inputs', ['index' => $grade->id, 'grade' => $grade])
                @endforeach
            @else
                {{-- jau saglabātās atzīmes (tikai apskatei). Cits mainīgā nosaukums, lai $grade neizplūst uz include --}}
                @foreach ($existing_grades as $existing)
                    <x-disabled-grade-inputs :grade="$existing" />
                @endforeach

                {{-- jaunās atzīmes; 'grade' => null nodrošina, ka lauki ir tukši --}}
                @foreach ($oldGrades as $i => $g)
                    @include('components.grade-inputs', ['index' => $i, 'grade' => null])
                @endforeach

                {{-- neredzama veidne priekš js --}}
                <template id="grade-template">
                    @include('components.grade-inputs', ['index' => '__INDEX__', 'grade' => null])
                </template>
            @endif
        </div>

        <input type="hidden" name="subject_id" id="subject_id" value="{{ $subject_id }}"/>

        <button type="submit" class="cursor-pointer text-white bg-blue-600 box-border border border-transparent shadow-xs font-medium leading-5 rounded-md text-sm px-4 py-2.5 hover:bg-blue-700">{{ isset($grades) ? 'Saglabāt' : 'Izveidot' }}</button>

        @if ($errors->any())
            <ul class="py-1 px-3 mt-3 bg-red-50 dark:bg-red-800 dark:text-white ring-1 ring-red-500 rounded-lg text-red-500 font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @unless ($isEdit)
            <script>
                // iegūst nākamās atzīmes indeksu, lai iesniedzot iepriekšējās ievadlauku grupas netiek pārrakstītas ar pašu pēdējo
                let gradeIndex = {{ count($oldGrades) }};

                // iegūst veidni un pārmaina katru __INDEX__ ar gradeIndex
                document.getElementById('add-grade').addEventListener('click', () => {
                    const html = document.getElementById('grade-template').innerHTML.replaceAll('__INDEX__', gradeIndex++);

                    // pievieno ievadlauku grupu grades-container beigās
                    document.getElementById('grades-container').insertAdjacentHTML('beforeend', html);
                });
            </script>
        @endunless
    </form>
</x-layout>