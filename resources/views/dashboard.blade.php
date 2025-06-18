<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-[65px] text-gray-900 dark:text-gray-100">
                    
                    <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
                    <main>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="board relative col-span-2 rounded">
                                <div class="flex items-center justify-between absolute z-10 top-[-55px] w-[100%]">
                                    <div class="flex space-x-2">
                                        <p class="bg-[#4B4847] p-[7px] rounded"><img class="w-[35px] h-[35px]" src="/profile/man-user-black.svg"></img></p>
                                        <div>
                                            <p class="text-[#fff] font-bold">Opponent</p>
                                            <div><img width="25px" height="25px" src="/img/chesspieces/wikipedia/wP.png" alt=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center bg-[#2B2926] p-[3px] rounded font-medium text-[26px] w-[150px] mr-[5px]">
                                            <p class="text-right w-[100%] pr-[10px] text-[#82817F]">10:00</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between absolute z-10 bottom-[-55px] w-[100%]">
                                    <div class="flex space-x-2 ">
                                        <p class="bg-[#BEBDB9] p-[7px] rounded"><img class="w-[35px] h-[35px]" src="/profile/man-user-white.svg"></img></p>
                                        <div>
                                            <p class="text-[#fff] font-bold">Guest123</p>
                                            <div><img width="25px" height="25px" src="/img/chesspieces/wikipedia/bP.png" alt=""></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex items-center bg-[#989795] p-[3px] rounded font-medium text-[26px] w-[150px] mr-[5px]">
                                            <p class="text-right w-[100%] pr-[10px] text-[#6F6E6B]">10:00</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div>My board here</div> --}}
                                <div wire:ignore.self id="myBoard"></div>
                            </div>
                            
                            <div class="text-[#C3C3C2] bg-[#262522] overflow-hidden p-[10px] rounded-md">    
                                @livewire('inner-nav')
                                
                                <hr class="pt-[2px] mt-1" style="border-top: 1px solid #3C3B39" />
                                
                                
                                
                                <div class="clear-both"></div>
        
                                <div class="flex relative">
                                    {{-- <p class="text-[13px] left">Chess AI Analysis </p>
                                    <span class="text-[13px] right-[0] absolute">Depth=245 | Engine 17.1</span> --}}
                                </div>
                                {{-- <hr class="mt-1" style="border-top: 1px solid #3C3B39" /> --}}
                                {{-- <p class="text-[13px]"><span id="status"></span></p> --}}
                                {{-- <div class="hiddens"><label class="font-bold">Variantion:</label></div> --}}
                                {{-- <div class="hidden overflow-y-auto h-[43px]" id="pgn"></div> --}}
                                
                                <div class="text-[0px]" id="wireMaingameVariantion"></div>
                                @livewire('post-request')
                                
                                <div class="hidden">
                                    <label>Won:</label>
                                    <div id="colorWon"></div>
                            
                                    <label">FEN:</label>
                                    <div id="fen"></div>
        
                                    <label>Move Id:</label>
                                    <div id="moveId"></div>
                            
                                    <label>Move Source:</label>
                                    <div id="moveSource"></div>
                                    <br />
                                </div>
        
                                {{-- <div>
                                    @livewire('stockfish-component')
                                </div> --}}
        
        
                                <hr class="py-2 mt-1" style="border-top: 1px solid #3C3B39" />
        
                                <div class="buttons w-[100%] overflow-hidden">
                                    {{-- <div class="pb-[10px]">
                                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" id="#" class="w-[100%] bg-[#81B64C] hover:bg-[#A3D160] text-white font-bold py-2 rounded">
                                            <div style="margin:0 auto" class="w-[100px] display-block">
                                                <svg class="h-6 w-6 text-white absolute hover:text-[#fff]"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                                <span class="text-[18px] hover:text-[#fff]">Save</span>
                                            </div>
                                        </button>
                                    </div> --}}
                                    
                                    @livewire('add-variation')
        
                                    <div class="w-[50%] text-center float-left">
                                        <button class="w-[99%] bg-[#3C3B39] hover:bg-[#454341] text-[#C3C3C2] font-bold py-2 rounded" id="btnstart">
                                            <div style="margin:0 auto" class="w-[133px] display-block">
                                                <svg class="h-6 w-6 text-[#C3C3C2] absolute hover:text-[#fff]"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />  <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" /></svg>
                                                <span class="ml-[30px] hover:text-[#fff]">Start Position</span>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="w-[50%] text-center float-left">
                                        <button class="w-[99%] bg-[#3C3B39] hover:bg-[#454341] text-[#C3C3C2] font-bold py-2 rounded" id="btnflip">
                                            <div style="margin:0 auto" class="w-[133px] display-block">
                                                <svg class="h-6 w-6 text-[#C3C3C2] absolute hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" /></svg>
                                                <span class="ml-[30px] hover:text-[#fff]">Flip Position</span>
                                            </div>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </main>
    
                    <script src="/script/jquery-3.7.1.min.js"></script>
                    <script src="/script/chessboard-1.0.0.min.js"></script>
                    <script src="/script/chess-0.10.2.min.js"></script>
                    <script src="/script/main.js"></script>
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
