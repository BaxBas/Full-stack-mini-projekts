
<header>
    <nav class="bg-white shadow-md dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0 flex items-center">
          <span class="text-xl font-bold text-blue-700 dark:text-blue-500"><a href="/">Educational progress</a></span>
        </div>

        <!-- Desktop menu -->
        <div class="hidden md:block sm:ml-6">
          <ul class="flex space-x-4 text-gray-700 font-medium items-center dark:text-white">
            <li><a href="/" class="hover:text-blue-600 px-3 py-2 rounded-md text-sm dark:hover:text-blue-500">Visi priekšmeti</a></li>

            <!-- More Info Dropdown -->
            <li class="relative group">
              <button class=" cursor-pointer hover:text-blue-600 px-3 py-2 rounded-md text-sm flex items-center  dark:hover:text-blue-500">
                Grupas
                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Dropdown Menu -->
              <ul class="absolute z-99 left-0 mt-2 w-48 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-md shadow-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150">
                @forelse($groups as $group)
                  <li><a href="/groups/{{ $group->id }}" class="block px-4 py-2 rounded-md hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-600 dark:hover:text-white">{{ $group->nosaukums }}</a></li>
                  @empty
                  <li class="block px-4 py-2 hover:bg-blue-50 hover:text-blue-600">Nav grupu</li>
                @endforelse
              </ul>
            </li>
          </ul>
        </div>

        <!-- Right: creation buttons + mobile toggle -->
        <div class="flex items-center gap-3">
          <a href="/create/subject" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm font-medium hidden sm:block">+ Priekšmets</a>
          <a href="/create/group" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm font-medium hidden sm:block">+ Grupa</a>
          <x-theme-toggle />

          <!-- Mobile menu button / sm -> 640px vai platākos ekrānos -->
          <div class="md:hidden">
            <button id="mobile-menu-button" type="button"
              class="cursor-pointer inline-flex items-center justify-center p-2 rounded-md ring-2 ring-slate-500 text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
              <span class="sr-only">Open main menu</span>
              <svg class="block h-6 w-6 stroke-slate-800 dark:stroke-slate-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 bg-slate-100 dark:bg-gray-700">
        <a href="#" class="block px-3 py-2 text-gray-900 dark:text-white rounded-md hover:bg-white dark:hover:bg-gray-800 text-base font-medium">Visi priekšmeti</a>

        <!-- Mobile Dropdown -->
        <div class="relative">
          <button
            class="cursor-pointer w-full text-left px-3 py-2 text-gray-900 dark:text-white rounded-md hover:bg-white dark:hover:bg-gray-800 text-base font-medium flex items-center justify-between mobile-dropdown-trigger">
            Grupas
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>
          <div class="hidden pl-4 py-2 mobile-dropdown-content">
            @forelse($groups as $group)
              <a href="/groups/{{ $group->id }}" class="block px-4 py-2 rounded-md hover:bg-white dark:hover:bg-gray-800 dark:text-white">{{ $group->nosaukums }}</a>
              @empty
              <span href="#" class="cursor-not-allowed block py-1 dark:text-white">Nav grupu</span>
            @endforelse
          </div>
        </div>

        <a href="/create/subject" class="block px-3 py-2 text-blue-600 dark:text-blue-500 hover:bg-white dark:hover:bg-gray-800 font-semibold rounded-md text-base font-medium">+ Priekšmets</a>
        <a href="/create/group" class="block px-3 py-2 text-blue-600 hover:bg-white dark:text-blue-500 dark:hover:bg-gray-800 font-semibold rounded-md text-base font-medium">+ Grupa</a>
      </div>
    </div>
  </nav>

  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });

    // Mobile dropdown toggle
    document.querySelectorAll('.mobile-dropdown-trigger').forEach(trigger => {
      trigger.addEventListener('click', function () {
        const content = this.nextElementSibling;
        content.classList.toggle('hidden');
      });
    });
  </script>
</header>