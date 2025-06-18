<div class="py-12">
    <script>
        var variationReturn = @json($variantion);
        var variantion = [];
        for(var i = 0; i < variationReturn.length; i++){
            variantion.push(variationReturn[i]['moves']);
        }

        
        var fenedVariantionReturn = @json($fenedVariantion);
        var fenedVariantion = [];
        for(var i = 0; i < fenedVariantionReturn.length; i++){
            fenedVariantion.push(fenedVariantionReturn[i]['fened']);
        }

    </script>

    <div id="rightindex" class="hidden">0</div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
                <main>
                    <div class="grid grid-cols-3 gap-4">
                        <div id="myBoard" class="col-span-2 rounded"></div>

                        <div class="text-[#C3C3C2] bg-[#262522] overflow-hidden p-[10px] rounded-md">    
                            @livewire('inner-nav')
                            <hr class="pt-[2px] mt-1" style="border-top: 1px solid #3C3B39" />
                            <div class="clear-both"></div>



                            {{-- <div class="flex relative">
                                <p class="text-[13px] left">Chess AI Analysis </p>
                                <span class="text-[13px] right-[0] absolute">Depth=245 | Engine 17.1</span>
                            </div>
                            <hr class="mt-1" style="border-top: 1px solid #3C3B39" /> --}}


                            
                            <div class="flex items-center py-1 justify-start space-x-3">
                                
                                <div class="flex items-center justify-center bg-[#81B64C] hover:bg-[#A3D160]  w-[45px] h-[40px] rounded">
                                    @if ($data[0]->rwhite === 1)
                                        <img width="35px" height="35px" src="/img/chesspieces/wikipedia/bP.png" alt="">
                                    @elseif($data[0]->rblack === 1)
                                        <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                    @elseif($data[0]->white === 1)
                                        <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wQ.png" alt="">
                                    @elseif($data[0]->black === 1)
                                        <img width="35px" height="35px" src="/img/chesspieces/wikipedia/bQ.png" alt="">
                                    @else
                                        <img width="35px" height="35px" src="/img/chesspieces/wikipedia/wP.png" alt="">
                                    @endif
                                </div> 
                                <div>
                                    <p class="text-[15px]">{{ $data[0]->name }} </p>
                                    <p class="text-[12px] text-[#686866]">{{ $data[0]->formatted_created_at }} </p>
                                </div>
                                
                            </div>
                            <hr class="mt-1" style="border-top: 1px solid #3C3B39" />
                            
                            <div class="detailsVariation h-[326px] position-relative overflow-y-auto">
                                {{-- <p wire:loading class="text-[13px] pb-2 text-[#C3C3C2]">Analizing ...</p> --}}
                                
                                <ul>
                                    @foreach ($moveVariation as $key => $variation)
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
                                </ul>
                            </div>
                            <hr class="mt-1 pb-3" style="border-top: 1px solid #3C3B39" />

                            <div class="mb-2 col-span-2 sm:col-span-1">
                                <select id="timedelayed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected value="">Select Time Delay</option>
                                    <option value="100">Time: 100ms</option>
                                    <option value="200">Time: 200ms</option>
                                    <option value="300">Time: 300ms</option>
                                    <option value="400">Time: 400ms</option>
                                    <option value="500">Time: 500ms</option>
                                    <option value="1000">Time: 1000ms</option>
                                    <option value="1500">Time: 1500ms</option>
                                    <option value="2000">Time: 2000ms</option>
                                </select>
                            </div>

                            <div  class="pb-[7px]">
                                <button id="play" class="w-[100%] bg-[#81B64C] hover:bg-[#A3D160] text-white font-bold py-2 rounded">
                                    <div class="flex justify-center space-x-2">
                                        <svg class="h-6 w-6 text-white hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />  <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" /></svg>
                                        <span class="text-[18px] hover:text-[#fff]">Play</span>
                                    </div>
                                </button>
                                <div id="pauseresumebutton" class="hidden">
                                    <button id="pause" class="w-[100%] bg-[#3C3B39] hover:bg-[#454341] text-white font-bold py-2 rounded">
                                        <div class="flex justify-center space-x-2">
                                            <svg class="h-6 w-6 text-white-500 hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="6" y="4" width="4" height="16" />  <rect x="14" y="4" width="4" height="16" /></svg>
                                            <span class="text-[18px] hover:text-[#fff]">Pause</span>
                                        </div>
                                    </button>
                                    <button id="resume" class="hidden w-[100%] bg-[#81B64C] hover:bg-[#A3D160] text-white font-bold py-2 rounded">
                                        <div class="flex justify-center space-x-2">
                                            <svg class="h-6 w-6 text-white hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z" />  <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" /></svg>
                                            <span class="text-[18px] hover:text-[#fff]">Resume</span>
                                        </div>
                                    </button>
                                    
                                    {{-- <button id="stop" class="w-[100%] mt-2 bg-[#3C3B39] hover:bg-[#454341] text-white font-bold py-2 rounded">
                                        <div class="flex justify-center space-x-2">
                                            <svg class="h-6 w-6 text-white-500 hover:text-[#fff]"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <rect x="9" y="9" width="6" height="6" /></svg>
                                            <span class="text-[18px] hover:text-[#fff]">Stop</span>
                                        </div>
                                    </button> --}}
                                </div>
                            </div>
                
                            <div class="overflow-hidden">
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

                            @if ($userId == 1)
                                <hr class="mt-3 pb-3" style="border-top: 1px solid #3C3B39" />
                                <div>
                                    <button onclick="deleteMove({{ $id }})" id="delete" class="w-[100%] bg-red-700 hover:bg-red-500 text-white font-bold py-2 rounded">
                                        <div class="flex justify-center space-x-2">
                                            <svg class="h-6 w-6 text-white hover:text-[#fff]"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            
                                            <span class="text-[18px] hover:text-[#fff]">Delete</span>
                                        </div>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                </main>

                <script src="/script/jquery-3.7.1.min.js"></script>
                <script src="/script/chessboard-1.0.0.min.js"></script>
                <script src="/script/chess-0.10.2.min.js"></script>

                <script>
                    var board = null;
                    var game = new Chess();
                    board = Chessboard("myBoard", "start");
                </script>


                {{-- <script>
                    var onDragStart = function(source, piece, position, orientation) {  
                        // if it's not white, don't allow drag
                        if (piece.search(/^w/) === -1){
                            return false;
                        }
                    };

                    var cfg = {
                    draggable: true,
                    position: 'start',
                    onDragStart: onDragStart
                    };
                    var board = ChessBoard('myBoard', cfg);

                </script> --}}


                <script>
                    // pause and play
                    var pause = false;
                    $("#play").on("click", function () {
                        (async () => {
                        var delayeNo = 0;
                        var timedelayed = jQuery('#timedelayed').val();
                        var setTimeDelayed = 500;
                        if(timedelayed == ""){
                            setTimeDelayed = 1000;
                        }else{
                            setTimeDelayed = timedelayed;
                        }
                        

                        for (let i = 0; i < variantion.length; i++) {
                            while (pause) {
                                await new Promise((res) => setTimeout(res, 500));
                                console.log("waiting");
                                
                            }
                            await new Promise((res) => setTimeout(res, setTimeDelayed));
                            if (variantion[i][1]) {
                                board.move(variantion[i][0], variantion[i][1]);
                                
                            } else {
                                board.move(variantion[i][0]);
                                
                            }
                            delayeNo++;

                            
                            if(i+1 === variantion.length){
                                jQuery("#pause").addClass('hidden').stop();
                                
                            }
                            board.position(fenedVariantion[i]);
                            
                        }
                        


                        })();
                        $("#play").addClass('hidden');
                        $("#timedelayed").addClass('hidden').stop();
                        $("#pauseresumebutton").removeClass('hidden');


                        // $thisfened = game.fen();
                        // var datafenedString = "";
                        // datafenedString += $thisfened +" && ";
                        // console.log(datafenedString);
                        
                    });

                    

                    jQuery("#pause").on("click", function () {
                        jQuery(this).addClass('hidden').stop();
                        jQuery("#resume").removeClass('hidden').stop();
                        pause = true;
                    });
                    jQuery("#resume").on("click", function () {
                        jQuery(this).addClass('hidden').stop();
                        jQuery("#pause").removeClass('hidden').stop();
                        pause = false;
                    });
                    // pause and play last


                    

                    $("#btnstart").on("click", function () {
                        location.reload();
                        // Livewire.navigate('{{ request()->fullUrl() }}');
                    });

                    $("#stop").on("click", function () {
                        variantion = [];
                        var board = null;
                        var game = new Chess();
                        board = Chessboard("myBoard", "start");
                        Livewire.navigate('{{ request()->fullUrl() }}');
                        
                    });

                    $("#btnflip").on("click", board.flip);


                </script>

                {{-- <script>
                    document.onkeydown = function(e) {
                        console.log(board);
                    }
                </script> --}}

                <script>
                    document.onkeydown = function(e) {
                        jQuery('#timedelayed').addClass('hidden');
                        jQuery('#pauseresumebutton').addClass('hidden');
                        jQuery('#pause').addClass('hidden');
                        jQuery('#pauplayse').addClass('hidden');
                        jQuery('#play').addClass('hidden');
                        
                        var rightindex = parseInt(jQuery('#rightindex').text());
                        var leftindex = parseInt(jQuery('#rightindex').text() - 2);
                        var setPosition = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
                        

                        // top key
                        if(e.keyCode == 38){
                            jQuery('#rightindex').text(0);
                            board.position(setPosition);
                        }


                        // bottom key
                        if(e.keyCode == 40){   
                            jQuery('#rightindex').text(fenedVariantion.length);
                            var lastMoveid = fenedVariantion.length - 1;
                            var lastMove = fenedVariantion[lastMoveid];
                            board.position(lastMove);
                        }



                        // right key
                        if(e.keyCode == 39){
                            if(rightindex < fenedVariantion.length){
                                jQuery('#rightindex').text(rightindex + 1);
                            }
                            for(i = 0; i < fenedVariantion.length; i++){
                                if(i === rightindex){
                                board.move(variantion[i][0]);
                                board.position(fenedVariantion[i]);
                                }
                            }
                        }



                        // left key
                        if(e.keyCode == 37){ 
                            if(rightindex > 0){
                                jQuery('#rightindex').text(rightindex - 1);
                            }

                            for(i = 0; i < fenedVariantion.length; i++){
                                if(i === leftindex){
                                    board.move(variantion[i][0]);
                                    board.position(fenedVariantion[i]);
                                }


                                if(leftindex === -1){
                                    board.position(setPosition);
                                }
                            }
                        }

                        
                    }
                </script>

                <script>
                    function deleteMove(moveId){
                        if(confirm('Are you sure you want to delete this move?')){
                            @this.call('deleteItem', moveId);
                        }
                    }
                </script>

            </div>
        </div>
    </div>
</div>
