<div>
    
    <div>
        <hr class="pt-[2px] mt-[16px] pb-[10px]" style="border-top: 1px solid #3C3B39" />
        <div style="position: relative;">
            <style>.bestmovebg{border:1px solid #fff;display:inline-block;width:15px;height:15px}.bestmovebg.bestbgw{background-color:#fff}.bestmovebg.bestbgb{background-color:#000}.bestmovespan{font-size:14px;font-weight:100}</style>
            {{-- <strong>You entered:</strong> {{ $inputValue }}
            <p>Fen String: {{ $fen }}</p> --}}
            {{-- <p class="font-bold position-relative">Chess AI Analysis <span class="absolute text-[13px]" style="right:0">Depth=245 | Stockfish 17.1</span></p>
            <hr class="py-2 mt-1" style="border-top: 1px solid #3C3B39" /> --}}
            
            <p class="hidden">{{ $best_move }}</p>
            <button wire:loading type="button" style="z-index: 2;" class="absolute h-[38px] w-[165px] my-[90px] mx-[30%] bg-[#454341] rounded px-3 py-2">
                <div style="position: relative;display: inline-flex;">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text-[#C3C3C2]" style="margin-top: -1px;">Processing . . .</span>
                </div>
            </button>

            <div class="allnotaions relative h-[200px] overflow-x-auto">
                {{-- <p wire:loading class="text-[13px] pb-2 text-[#C3C3C2]">Analizing ...</p> --}}
                
                <ul>
                    @foreach ($getAllNotations as $index => $notation)
                        <li class="p-1">
                            <p class="text-[13px] text-[#C3C3C2] hover:text-[#fff] cursor-pointer">
                                <span class="text-[#686866] font-bold">{{ $index + 1 }}. </span>
                                <span>Score: {{ $notation['score_cp'] }}</span>
                                <span class="ml-3">Pv: <a href="#" onclick="window.open('/stock-details?data={{ $notation['pv'] }}&fen={{ $fen }}&toggle={{ $toggleFlip }}','null','width=472px,height=472px,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes')">{{ $notation['pv'] }}</a>  , ...</span>
                            </p>
                        </li>
                    @endforeach

                    @if(empty($getAllNotations))
                        <li class="p-1 bg-[#2A2926]">
                            <p class="text-[13px] text-[#C3C3C2] hover:text-[#fff] cursor-pointer">
                                <span>No item found.</span>
                            </p>
                        </li>
                    @endif
                </ul>
            </div>
            {{-- <hr class="pt-[2px] mt-[16px]" style="border-top: 1px solid #3C3B39" /> --}}
            <p class="h-[24px] mt-2" id="fbestmove"><strong class="flex items-center justify-left space-x-2">{!! $filster_best_move !!}</strong></p>
        </div>
        
        <button id="sendDataBtn" class="hidden bg-red-600 hover:bg-red-700 px-2 py-2 text-white rounded"">Get best move from stockfish</button>
        <button wire:click="callMethod" id="callmethod" class="hidden bg-yellow-600 hover:bg-yellow-700 px-2 py-2 mx-2 my-2 text-white rounded"">submit stockfish</button>
    </div>
    
    <script>
        // JavaScript code to trigger Livewire event
        document.getElementById('sendDataBtn').addEventListener('click', function() {
            // Example JavaScript variable
            let jsVariable = document.getElementById("fen").innerText;
            
            // Emit the event to the Livewire component
            // Livewire.emit('updateInputValue', jsVariable);
            @this.set('inputValue', jsVariable);
            @this.set('fen', jsVariable);
            jQuery('#callmethod').trigger('click');
            
        });
    </script>
    
</div>
