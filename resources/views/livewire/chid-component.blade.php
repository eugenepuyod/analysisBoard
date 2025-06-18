<div>
    {{-- <p>This is best move: {{ $aiMoveStart }} {{$aiMoveEnd}}</p> --}}
    {{-- <p>Message: {{ $checkmateMessage }}</p> --}}
    <div class="flex justify-between">
        <div class="flex items-center py-1 justify-start space-x-2">
            <div class="flex items-center justify-center bg-[#81B64C] hover:bg-[#A3D160]  w-[45px] h-[40px] rounded">
                @if($selectcolor == "black")
                    <img width="35px" height="35px" src="/img/chesspieces/wikipedia/bQ.png" alt="">
                @else
                    <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wQ.png" alt="">
                @endif
            </div> 
            <div>
                <p class="text-[15px]">You</p>
                <p class="text-[12px] text-[#686866]">{{ now() }} </p>
            </div>
        </div>
        <div class="flex items-center py-1 justify-center space-x-2">
            <div>
                <p class="text-[15px] p-[10px]">VS</p>
            </div>
        </div>
        <div class="flex items-center py-1 justify-start space-x-2">
            <div class="flex items-center justify-center bg-[#81B64C] hover:bg-[#A3D160]  w-[45px] h-[40px] rounded">
                @if($selectcolor == "black")
                    <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wQ.png" alt="">
                @else
                    <img width="35px" height="35px" src="/img/chesspieces/wikipedia/bQ.png" alt="">
                @endif
            </div> 
            <div>
                @foreach ($selectOponent as $index => $item)
                    @if ($index == $aiRandomLevel)
                        <p class="text-[15px]">{{ $item }}</p>
                    @endif
                @endforeach

                <p class="text-[12px] text-[#686866]">{{ now() }} </p>
            </div>
        </div>
        
    </div>
    <hr class="py-2 mt-1" style="border-top: 1px solid #3C3B39" />
    <div class="relative h-[50px]">
        <button wire:loading type="button" style="z-index: 2;" class="absolute h-[38px] w-[165px] my-[0px] mx-[30%] bg-[#454341] rounded px-3 py-2">
            <div style="position: relative;display: inline-flex;">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="#" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-[#C3C3C2]" style="margin-top: -1px;">Processing . . .</span>
            </div>
        </button>
    </div>

    
    <div id="startbuttons">
        @if($playing == 0)
        <div class="mb-2 col-span-2 sm:col-span-1">
            <select wire:model.live="aiRandomLevel" id="aiRandomLevel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @foreach ($selectOponent as $index => $oponent)
                    <option selected value="{{ $index }}">{{ $oponent }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 col-span-2 sm:col-span-1">
            <select wire:model.live="selectcolor" id="botcolor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option selected value="white">White</option>
                <option value="black">Black</option>
            </select>
        </div>
        
        <div>
            <button wire:click="getplaying" id="botplay" class="w-[100%] bg-[#81B64C] hover:bg-[#A3D160] text-white font-bold py-2 rounded">
                <div class="flex justify-center space-x-2">
                    <svg class="h-6 w-6 text-white hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />  <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" /></svg>
                    <span class="text-[18px] hover:text-[#fff]">Play</span>
                </div>
            </button>
        </div>
        @else

        @endif
    </div>

    <div class="buttons w-[100%] overflow-hidden">
        @livewire('add-variation')

        <div id="buttonnewflip" class="{{ $playing == 0 ? 'hidden' : ''}}">
            <div class="w-[50%] text-center float-left">
                <button class="w-[99%] bg-[#3C3B39] hover:bg-[#454341] text-[#C3C3C2] font-bold py-2 rounded" id="btnstart">
                    <a href="/main-board" wire:navigate>
                        <div style="margin:0 auto" class="w-[133px] display-block">
                            <svg class="h-6 w-6 text-[#C3C3C2] absolute hover:text-[#fff]"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />  <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" /></svg>
                            <span class="ml-[30px] hover:text-[#fff]">Restart Game</span>
                        </div>
                    </a>
                </button>
            </div>
            <div class="buttonflipp w-[50%] text-center float-left">
                <button class="w-[99%] bg-[#3C3B39] hover:bg-[#454341] text-[#C3C3C2] font-bold py-2 rounded" id="btnflippos">
                    <div style="margin:0 auto" class="w-[133px] display-block">
                        <svg class="h-6 w-6 text-[#C3C3C2] absolute hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="9" y="9" width="13" height="13" rx="2" ry="2" />  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" /></svg>
                        <span class="ml-[30px] hover:text-[#fff]">Flip Position</span>
                    </div>
                </button>
            </div>
        </div>

    </div>
    

    <button id="chessBotData" class="hidden bg-red-600 hover:bg-red-700 px-2 py-2 text-white rounded"">Get best move from stockfish</button>
    <button wire:click="chessBotInit" id="callmethod" class="hidden bg-yellow-600 hover:bg-yellow-700 px-2 py-2 mx-2 my-2 text-white rounded">submit stockfish</button>
    
    <div class="hidden">
        <div id="aiFilterStart">{{ $aiMoveStart }}</div>
        <div id="aiFilterEnd">{{ $aiMoveEnd }}</div>
        <div id="aiFilterMerge">{{ $filterBestMove }}</div>
        <div id="aiRandomLevel">{{ $aiRandomLevel }}</div>
        <div id="selectcolor">{{ $selectcolor }}</div>
    </div>
    <button id="aibotTurn" class="hidden bg-yellow-600 hover:bg-yellow-700 px-2 py-2 mx-2 my-2 text-white rounded">submit</button>
    
    <script>
        document.getElementById('chessBotData').addEventListener('click', function() {
            let aiFen = document.getElementById("botfen").innerText;
            let aiRandomLevel = document.getElementById("aiRandomLevel").innerText;
            @this.set('aiFen', aiFen);
            jQuery('#callmethod').trigger('click');
            
            setTimeout(function(){
                jQuery('#aibotTurn').trigger('click');

            }, 2000);
        });

        document.getElementById('botplay').addEventListener('click', function() {
            let selectcolor = document.getElementById("selectcolor").innerText;

            var config = {
                draggable: true,
                position: "start",
                onDragStart: onDragStart,
                onDrop: onDrop,
                onSnapEnd: onSnapEnd,
            };

            board = Chessboard("myBoard", config);

            if(selectcolor == "black"){
                board.flip();
                AIupdateStatus();
                jQuery('#chessBotData').trigger('click');
            }

            @this.set('selectcolor', selectcolor);
            
        });

        

        document.getElementById('aibotTurn').addEventListener('click', function() {
            let aiFilterStart = document.getElementById("aiFilterStart").innerText;
            let aiFilterEnd = document.getElementById("aiFilterEnd").innerText;
            let aiFilterMerge = document.getElementById("aiFilterMerge").innerText;
            
            if(aiFilterMerge !== "mate"){
                move = game.move({'from':aiFilterStart, 'to':aiFilterEnd});
                // if(aiFilterMerge == 'e1-g1'){
                //     board.move('e1-g1', 'h1-f1');
                // }else if(aiFilterMerge == 'e1-c1'){
                //     board.move('e1-c1', 'a1-d1');
                // }else if(aiFilterMerge == 'e8-g8'){
                //     board.move('e8-g8', 'h8-f8');
                // }else if(aiFilterMerge == 'e8-c8'){
                //     board.move('e8-c8', 'a8-d8');
                // }
                // else{
                //     board.move(aiFilterMerge);
                // }
                board.move(aiFilterMerge);
                board.position(game.fen());
            }
        });

        jQuery('#btnflippos').click(function(){
            board.flip();
        })
            
    </script>
</div>
