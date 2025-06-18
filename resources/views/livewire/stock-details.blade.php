<div class="w-full">
    <script>
        var variationdata = @json($childVariation);
        var getvariation = [];
        for(var i = 0; i < variationdata.length; i++){
            getvariation.push(variationdata[i]['fen']);
        }

        var getvariationlast = [];
        for(var i = 0; i < variationdata.length; i++){
            getvariationlast.push(variationdata[i]['last']);
        }

        var getvariationfirst = [];
        for(var i = 0; i < variationdata.length; i++){
            getvariationlast.push(variationdata[i]['first']);
        }


        var fendata = @json($childFen);
        var getfendata = [];

        var toggle = @json($toggle);

    </script>
    <link rel="stylesheet" href="/css/chessboard-1.0.0.min.css" />
    <div>
        
        <div id="rightindex" class="hidden bg-[#fff] my-[0] mx-[auto] text-center">0</div>
        <div id="detailBoard" class="w-[470px] h-[470px] pt-[0px] my-[0] mx-[auto]"></div>
        <div></div>

    </div>


    <script src="/script/jquery-3.7.1.min.js"></script>
    <script src="/script/chessboard-1.0.0.min.js"></script>
    <script src="/script/chess-0.10.2.min.js"></script>

    


    <script>
        var detailGame = new Chess();
        var config = {
            draggable: false,
            position: "start",
        };
        detailBoard = Chessboard("detailBoard", config);
        detailBoard.position(fendata);
        if(toggle == 1){
            detailBoard.flip();
        }
    </script>

    <script>
        function getCastle(move){

        }

        for(i = 0; i < getvariation.length; i++){
                if(getvariation[i] == 'e1-g1'){
                    detailBoard.move(getvariation[i],'h1-f1');
                }else if(getvariation[i] == 'e8-g8'){
                    detailBoard.move(getvariation[i],'h8-f8');
                }else if(getvariation[i] == 'e1-c1'){
                    detailBoard.move(getvariation[i],'a1-d1');
                }else if(getvariation[i] == 'e8-c8'){
                    detailBoard.move(getvariation[i],'a8-d8');
                }
                else{
                    detailBoard.move(getvariation[i]);
                }
                
                getfendata.push(detailBoard.fen());
        }
    </script>

    <script>
        document.onkeydown = function(e) {

            var rightindex = parseInt(jQuery('#rightindex').text());
            var leftindex = parseInt(jQuery('#rightindex').text() - 2);
            var setPositionfen = fendata;

            // top key
            if(e.keyCode == 38){
                jQuery('#rightindex').text(0);
                detailBoard.position(setPositionfen);
            }



            // bottom key
            if(e.keyCode == 40){   
                jQuery('#rightindex').text(getvariation.length);
                var lastMoveid = getvariation.length - 1;
                var lastMove = getfendata[lastMoveid];
                detailBoard.position(lastMove);
            }




            // right key
            if(e.keyCode == 39){
                if(rightindex < getvariation.length){
                    jQuery('#rightindex').text(rightindex + 1);
                }
                for(i = 0; i < getvariation.length; i++){
                    if(i === rightindex){
                        detailBoard.move(getvariation[i]);
                        detailBoard.position(getfendata[i]);
                    }
                }
            }



            // left key
            if(e.keyCode == 37){
                if(rightindex > 0){
                    jQuery('#rightindex').text(rightindex - 1);
                }

                for(i = 0; i < getvariation.length; i++){
                    if(i === leftindex){
                        detailBoard.position(getfendata[i]);
                        detailBoard.move(getvariation[i]);
                        
                    }

                    if(leftindex === -1){
                        if(setPositionfen){
                            detailBoard.position(setPositionfen);
                        }
                    }
                }
            }
        }
    </script>
</div>
