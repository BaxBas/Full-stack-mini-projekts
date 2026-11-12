@php $index = $index ?? 0; @endphp

{{-- izmanto indeksus, lai sagrupētu ievadlaukus. old("grades.$index.nosaukums") iegūst konkrētā indeksa iepriekš ievadīto vērtību error gadījumā --}}
<div class="bg-white dark:bg-gray-800 dark:text-white ring-1 ring-blue-500 rounded-lg px-4 pt-4">
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="grades[{{ $index }}][nosaukums]" id="nosaukums-{{ $index }}" value="{{ old("grades.$index.nosaukums", $grade->nosaukums ?? '') }}" placeholder=" " required class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-blue-400 peer"/>
        <label for="nosaukums-{{ $index }}" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nosaukums</label>
    </div>
    <div class="grid md:grid-cols-2 z-0 w-full gap-5 mb-5 group">
        <div class="relative z-0 w-full group">
            <input type="text" name="grades[{{ $index }}][ieguts]" id="ieguts-{{ $index }}" value="{{ old("grades.$index.ieguts", $grade->ieguts ?? '') }}" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-blue-400 peer"/>
            {{-- for vajadzīgs, lai label būtu piesaistīts pie pareizā ievadlauka --}}
            <label for="ieguts-{{ $index }}" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 start-0 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Iegūts</label>
        </div>
        <div class="relative z-0 w-full group">
            <input type="text" name="grades[{{ $index }}][svars]" id="svars-{{ $index }}" value="{{ old("grades.$index.svars", $grade->svars ?? '') }}" placeholder=" " required class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-blue-400 peer"/>
            <label for="svars-{{ $index }}" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 start-0 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Svars</label>
        </div>
    </div>
</div>