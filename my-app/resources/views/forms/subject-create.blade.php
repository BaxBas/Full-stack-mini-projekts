<x-layout>
    <form action="{{ isset($subject) ? route('subjects.update', $subject) : route('subjects.store') }}" method="POST" class="max-w-md mx-auto dark:text-white">
        @csrf 
        {{-- pasargā no csrf uzbrukumiem --}}
        @isset($subject)
            @method('PUT')
        @endisset

        <h1 class="text-3xl font-bold mb-5">Priekšmeta izveide</h1>

        {{-- old() ievieto lietotāja iepriekš ievadīto, ja radās kļūda --}}
        <div class="relative z-0 w-full mb-5 group">
            {{-- value prioritizē old(), ja neeksistē, tad pārbauda vai ir $subject (ja rediģē) --}}
            <input type="text" name="nosaukums" id="nosaukums" value="{{ old('nosaukums', $subject->nosaukums ?? '') }}"  placeholder=" " required class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-blue-400 peer"/>
            <label for="nosaukums" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nosaukums</label>
        </div>

        @php
            $selectedGroup = old('group_id', $subject->group_id ?? '');
        @endphp

        <div class="relative z-0 w-full mb-5 group">
            <label for="group_id" class="block text-sm text-body mb-1">Grupa</label>
            <select name="group_id" id="group_id" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium focus:outline-none focus:ring-0 focus:border-blue-400 peer">
                <option value="" class="bg-white dark:bg-gray-900 text-gray-500" selected>Nav grupas</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}" class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" @selected($group->id == $selectedGroup)>
                        {{ $group->nosaukums }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="cursor-pointer text-white bg-blue-600 box-border border border-transparent shadow-xs font-medium leading-5 rounded-md text-sm px-4 py-2.5 hover:bg-blue-700">{{ isset($subject) ? 'Saglabāt' : 'Izveidot' }}</button>

        @if ($errors->any())
            <ul class="py-1 px-3 mt-3 bg-red-50 dark:bg-red-800 dark:text-white ring-1 ring-red-500 rounded-lg text-red-500 font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </form>
</x-layout>