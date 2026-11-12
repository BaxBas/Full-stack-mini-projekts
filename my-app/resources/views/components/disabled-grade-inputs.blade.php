@props(['grade'])

{{-- @dd($grade); // atkļūdošana --}}

<div class="bg-gray-300 dark:bg-gray-500 dark:text-white ring-1 ring-gray-500 rounded-lg px-4 pt-4 pb-0.5">
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="nosaukums" id="nosaukums" value="{{ $grade['nosaukums'] }}" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none peer" disabled/>
        <label for="nosaukums" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nosaukums</label>
    </div>
    <div class="relative grid md:grid-cols-2 z-0 w-full gap-5 mb-5 group">
        <div class="relative z-0 w-full group">
            <input type="text" name="ieguts" id="ieguts" value="{{ $grade['ieguts'] }}" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none peer" disabled/>
            <label for="ieguts" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 start-0 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Iegūts</label>
        </div>
        <div class="relative z-0 w-full group">
            <input type="text" name="svars" id="svars" value="{{ $grade['svars'] }}" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none peer" disabled/>
            <label for="svars" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 start-0 top-3 origin-[0] peer-focus:start-0 peer-focus:text-fg-blue-400 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Svars</label>
        </div>
    </div>
</div>