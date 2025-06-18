<div class="grid grid-cols-4 gap-1 items-center">
    <div class="{{ request()->routeIs('json-page') ? 'bg-[#3C3B39]' : ''}} p-2 text-center text-[12px] hover:bg-[#3C3B39] cursor-pointer rounded">
        <a href="/json-page" wire:navigate>
            <svg class="my-[0] mx-[auto] text-[#C3C3C2] hover:text-[#fff] h-6 w-6 "  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="12" y1="3" x2="12" y2="7" />  <line x1="12" y1="21" x2="12" y2="18" />  <line x1="3" y1="12" x2="7" y2="12" />  <line x1="21" y1="12" x2="18" y2="12" />  <line x1="12" y1="12" x2="12" y2="12.01" /></svg>
            <p class="hover:text-[#fff]">
                <span>Analysis 17.1</span>
                
            </p>
        </a>
    </div>
    <div class="{{ request()->routeIs('dashboard') ? 'bg-[#3C3B39]' : ''}} p-2 text-center text-[12px] hover:bg-[#3C3B39] cursor-pointer rounded">
        <a href="/dashboard" wire:navigate>
            <svg class="my-[0] mx-[auto] text-[#C3C3C2] hover:text-[#fff] h-6 w-6"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
            <p class="hover:text-[#fff]">New Game</p>
        </a>
    </div>
    <div class="{{ request()->routeIs('all-games') ? 'bg-[#3C3B39]' : ''}} p-2 text-center text-[12px] hover:bg-[#3C3B39] cursor-pointer rounded">
        <a href="/all-games" wire:navigate>
            <svg class="my-[0] mx-[auto] text-[#C3C3C2] hover:text-[#fff] h-6 w-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="2" y="6" width="20" height="12" rx="2" />  <path d="M6 12h4m-2 -2v4" />  <line x1="15" y1="11" x2="15" y2="11.01" />  <line x1="18" y1="13" x2="18" y2="13.01" /></svg>
            <p class="hover:text-[#fff]">Saved Game</p>
        </a>
    </div>
    <div class="{{ request()->routeIs('main-board') ? 'bg-[#3C3B39]' : ''}} p-2 text-center text-[12px] hover:bg-[#3C3B39] cursor-pointer rounded">
        <a href="/main-board" wire:navigate>
            <svg class="my-[0] mx-[auto] text-[#C3C3C2] hover:text-[#fff] h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>  
            <p class="hover:text-[#fff]">Computer</p>
        </a>
    </div>
</div>