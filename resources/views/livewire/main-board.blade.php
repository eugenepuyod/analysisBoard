<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
                <main>
                    <div class="grid grid-cols-3 gap-4">
                        <div wire:ignore.self id="myBoard" class="col-span-2 rounded"></div>
                        
                        <div class="text-[#C3C3C2] bg-[#262522] overflow-hidden p-[10px] rounded-md">    
                            @livewire('inner-nav')
                            <hr class="pt-[2px] mt-1" style="border-top: 1px solid #3C3B39" />
                            
                            <div class="clear-both"></div>

                            {{-- Ai chess bot start here --}}
                            <script src="/script/jquery-3.7.1.min.js"></script>
                            <script src="/script/chessboard-1.0.0.min.js"></script>
                            <script src="/script/chess-0.10.2.min.js"></script>
                            
                                <div class="result hidden"><h1>Result query:</h1>
                                <label">Status:</label>
                                <div id="botstatus"></div>
                        
                                <label">FEN:</label>
                                <div id="botfen"></div>
                        
                                <label>Variantion:</label>
                                <div id="botpgn"></div>
                                </div>
                        
                            <script>
                                var board = null;
                                var game = new Chess();
                        
                                var $status = $("#botstatus");
                                var $fen = $("#botfen");
                                var $pgn = $("#botpgn");
                        
                                function onDragStart(source, piece, position, orientation) {
                                    // do not pick up pieces if the game is over
                                    if (game.game_over()) return false;
                        
                                    // only pick up pieces for the side to move
                                    if (
                                    (game.turn() === "w" && piece.search(/^b/) !== -1) ||
                                    (game.turn() === "b" && piece.search(/^w/) !== -1)
                                    ) {
                                    return false;
                                    }
                                }
                        
                                function onDrop(source, target, piece) {
                                    // see if the move is legal
                                    var move = game.move({
                                        from: source,
                                        to: target,
                                        promotion: "q", // NOTE: always promote to a queen for example simplicity
                                    });
                        
                                    // illegal move
                                    if (move === null) return "snapback";
                        
                                    AIupdateStatus();
                                    jQuery('#chessBotData').trigger('click');
                                    
                                    
                                }
                        
                        
                                function onSnapEnd() {
                                    board.position(game.fen());
                                }
                        
                                function AIupdateStatus() {
                                    var status = "";
                                    
                        
                                    var moveColor = "White";
                                    if (game.turn() === "b") {
                                        moveColor = "Black";
                                    }
                        
                                    var WonColor = "Black";
                                    if (game.turn() === "b") {
                                    WonColor = "White";
                                    }
                        
                                    // checkmate?
                                    if (game.in_checkmate()) {
                                        status = "Game over, " + moveColor + " is in checkmate.";
                                    
                                    }
                        
                                    // draw?
                                    else if (game.in_draw()) {
                                    status = "Game over, drawn position";
                                    }
                        
                                    // game still on
                                    else {
                                    status = moveColor + " to move";
                        
                                    // check?
                                    if (game.in_check()) {
                                        status += ", " + moveColor + " is in check";
                                    }
                                    }
                                    
                                    $status.html(status);
                                    $fen.html(game.fen());
                                    $pgn.html(game.pgn());

                                }
                        
                                var config = {
                                    draggable: false,
                                    position: "start",
                                };
                    
                                board = Chessboard("myBoard", config);
                        
                            </script>
                            @livewire('chid-component')
                            {{-- Ai chess bot last here --}}

                        </div>
                    </div>
                </main>

                

            </div>
        </div>
    </div>
</div>
