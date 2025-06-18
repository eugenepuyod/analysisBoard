<div class="py-12">
    <style>
        .game-pagination nav[role="navigation"] p{
            color:#DCDCDB;
        }
        /* span[aria-current='page'] span{
            background-color: #21201D;
            color: #fff;
        }
        nav[role='navigation'] div:nth-child(2) div:nth-child(2) span:nth-child(1) > span{
            background-color: #ddd;
        } */
    </style>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
                <main>
                    <div class="grid grid-cols-3 gap-4">
                        <div id="leftBox" class="p-3 text-white min-h-[200px] col-span-2 bg-[#262522] rounded-md">
                            <h4 class="text-[20px] text-[#DCDCDB]">Saved Game</h4>

                            <div class="searchgame pt-5">
                                <input type="text" class="bg-[#373634] w-full text-[#DCDCDB]" wire:model.live="search" placeholder="Search Game">
                            </div>
                            <div class="listgame">
                                {{-- <ul>
                                    @if ($allgames->count() > 0)
                                        @foreach ($allgames as $game)
                                            <li class="pt-5" wire:key="game.id">
                                                <div class="flex item-start space-x-7 bg-[#21201D] p-3 rounded">
                                                    <div class="flex items-start justify-center bg-green-600 hover:bg-green-500  w-[60px] h-[60px] rounded">
                                                        <a wire:navigate href="/details?id={{$game->id}}">
                                                            @if ($game->rwhite === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/bP.png" alt="">
                                                            @elseif($game->rblack === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                                            @elseif($game->white === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                                            @elseif($game->black === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/bP.png" alt="">
                                                            @else
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                                            @endif
                                                        </a>
                                                    </div> 
                                                    <div class="flex items-center">
                                                            <div class="items-center text-[#DCDCDB] hover:text-[#fff]">
                                                                <a wire:navigate href="/details?id={{$game->id}}">
                                                                    <p class="font-bold">{{ $game->name }}</p>
                                                                    <p class="text-[13px]">{{ $game->created_at }}</p>
                                                                </a>
                                                            </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="pt-5"><p class="text-[#DCDCDB] text-">No item found for: {{ $search }}</p></li>
                                    @endif
                                    
                                </ul> --}}


                                <div class="grid grid-cols-3 gap-1 pt-4">
                                    @if ($allgames->count() > 0)
                                        @foreach ($allgames as $game)
                                            
                                            <div class="{{ (strlen($game->name) > 20) ? 'col-span-2' : ''}}" wire:key="game.id">
                                                <div class="flex items-center justify-start space-x-2 bg-[#21201D] hover:bg-[#3C3B39] p-3 rounded">
                                                    <div class="flex items-center justify-center bg-[#81B64C] hover:bg-[#A3D160]  min-w-[65px] h-[60px] rounded">
                                                        <a wire:navigate href="/details?id={{$game->id}}">
                                                            @if ($game->rwhite === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/bP.png" alt="">
                                                            @elseif($game->rblack === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                                            @elseif($game->white === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wQ.png" alt="">
                                                            @elseif($game->black === 1)
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/bQ.png" alt="">
                                                            @else
                                                                <img width="50px" height="50px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                                            @endif
                                                        </a>
                                                    </div> 
                                                    <div class="flex items-center">
                                                            <div class="items-center text-[#DCDCDB] hover:text-[#fff]">
                                                                <a wire:navigate href="/details?id={{$game->id}}">
                                                                    <p class="font-bold">{{ $game->name }}</p>
                                                                    <div class="flex justify-between space-x-2">
                                                                        <p class="text-[13px] text-[#DCDCDB]">{{ round(count($game->moves) / 2) }}</p>
                                                                        <p class="text-[13px] text-[#686866] hover:text-white">{{ $game->formatted_created_at }}</p>
                                                                        
                                                                    </div>
                                                                </a>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="pt-5 col-span-3"><p class="text-[#DCDCDB] text-">No item found for: {{ $search }}</p></div>
                                    @endif
                                    
                                </div>

                            </div>

                            <div class="game-pagination pt-10">
                                <div class="text-[#DCDCDB]">{{ $allgames->appends(['search' => $search])->links() }}</div>
                            </div>



                        </div>
                        
                        
                        <div class="text-[#C3C3C2] bg-[#262522] overflow-hidden p-[10px] rounded-md">    
                            @livewire('inner-nav')
                            
                            <hr class="pt-[2px] mt-1" style="border-top: 1px solid #3C3B39" />
                            
                            <div class="clear-both"></div>

                            
                        </div>
                    </div>

                </main>

                <script src="/script/jquery-3.7.1.min.js"></script>
                <script src="/script/chessboard-1.0.0.min.js"></script>
                <script src="/script/chess-0.10.2.min.js"></script>
                {{-- <script src="/script/main.js"></script> --}}

            </div>
        </div>
    </div>
</div>
