<div>
    <div class="flex items-center py-1 justify-start space-x-3">
                            
        <div class="flex items-center justify-center bg-[#81B64C] hover:bg-[#A3D160]  w-[45px] h-[40px] rounded">
            @if ($moveTurn === 0)
                <img width="35px" height="35px" src="/img/chesspieces/wikipedia/bP.png" alt="">
            @else
                <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wP.png" alt="">
            @endif
        </div> 
        <div>
            <p class="text-[15px]">Your turn</p>
            <p class="text-[12px] text-[#686866]">{{ now() }} </p>
        </div>
        
    </div>
    <hr class="mt-1" style="border-top: 1px solid #3C3B39" />
    <div class="post-request-variation mt-[10px] h-[180px] position-relative overflow-y-auto">
        <ul>
            @foreach ($mainGameVarArray as $key => $variation)
                @if ($key%2==0)
                    <li class="p-1 bg-[#2A2926]">    
                @else
                    <li class="p-1">
                @endif
                        <div class="grid grid-cols-3 gap-3 text-[13px] text-[##C3C3C2] hover:text-[#fff] cursor-pointer">
                            <div><span class="text-[#686866] font-bold">{{ $key+1 }}.</span></div>
                            <div><span class="font-bold">{{ $variation['move1']}}</span></div>
                            <div><span class="font-bold">{{ $variation['move2']}}</span></div>
                            
                        </div>
                    </li>
            @endforeach

            @if(!count($mainGameVarArray) > 0)  
                <li class="p-1 bg-[#2A2926]">
                    <p class="text-[13px] text-[#C3C3C2] hover:text-[#fff] cursor-pointer">
                        <span>No item found.</span>
                    </p>
                </li>
            @endif
        </ul>
    </div>


    <button wire:click="getMainVarMathod" class="hidden bg-green-500 p-2 rounded text-[#000]" id="clickWireMaingameVariantion">
        Get variation from javascript
    </button>
    
    <script>
        document.getElementById('clickWireMaingameVariantion').addEventListener('click', function() {
            
            let gameVariantion = document.getElementById("wireMaingameVariantion").innerText;
            @this.set('maingameVariantion', gameVariantion);
            
        });
    </script>
</div>
