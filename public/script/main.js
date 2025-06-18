// var chessgame = new Chess();
// var moveDisplay = "";



function allowlegalmoves() {
  var board = null;
  var game = new Chess();
  var $status = $("#status");
  var $fen = $("#fen");
  var $inputfen = $("input#fen");
  var $fened = $("#fened");
  var $wirefened = $("#wirefened");
  var $pgn = $("#pgn");
  var $moveId = $("#moveId");
  var $moveSource = $("#moveSource");
  var $colorWon = $("#colorWon");
  var moveIdArray = "";
  var moveSourceArray = "";

  var $variantionId = $("#variantionId");
  var $wiregameVariantion = $("#wiregameVariantion");
  var $wireMaingameVariantion = $("#wireMaingameVariantion");
  var $moveIdId = $("#moveIdId");
  var $wiremoveId = $("#wiremoveId");
  var $wiregameturn = $("#wiregameturn");

  var $moveSourceId = $("#moveSourceId");
  var $wiremoveSourceId = $("#wiremoveSourceId");
  // var $colorWonId = $("#colorWonId");
  var $wirecolorWon = $("#wirecolorWon");
  var $savebutton = $("#savebutton");
  // var $name = $("#name");
  // var $description = $("textarea#description");
  // var $formselect = $("select#formselect");
  var datafened = [];
  var datafenedString = "";


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

    
    // chessgame.move(move);

    // illegal move
    if (move === null) return "snapback";

    updateStatus();

    moveIdArray += piece + source + target + " ";
    moveSourceArray += source + "-" + target + " ";
    $moveId.html(moveIdArray);
    $moveIdId.val(moveIdArray);
    $wiremoveId.html(moveIdArray);

    $moveSource.html(moveSourceArray);
    $moveSourceId.val(moveSourceArray);
    $wiremoveSourceId.html(moveSourceArray);
  }

  // update the board position after the piece snap
  // for castling, en passant, pawn promotion
  function onSnapEnd() {
    board.position(game.fen());
  }

  function updateStatus() {
    var status = "";
    

    var moveColor = "White";
    if (game.turn() === "b") {
      moveColor = "Black";
      $savebutton.removeClass("hidden");

    }

    var WonColor = "Black";
    if (game.turn() === "b") {
      WonColor = "White";
    }

    // checkmate?
    if (game.in_checkmate()) {
      status = "Game over, " + moveColor + " is in checkmate.";
      $colorWon.html(WonColor);
      // $colorWonId.val(WonColor);
      $wirecolorWon.html(WonColor);
      $savebutton.removeClass("hidden");
      
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
    $thisfened = game.fen();
    $status.html(status);
    $fen.html(game.fen());
    $pgn.html(game.pgn());
    $variantionId.val(game.vgn());
    $wiregameVariantion.html(game.vgn());
    $wireMaingameVariantion.html(game.vgn());
    datafenedString += $thisfened +" && ";

    $fened.val(datafenedString);
    datafened.push($thisfened);
    // console.log(datafened);
    $inputfen.val(game.fen());

    $wirefened.html(datafenedString)
    $wiregameturn.html(game.turn())

    jQuery('#sendDataBtn').trigger('click');
    jQuery('#clickWireMaingameVariantion').trigger('click');
  }

  var config = {
    draggable: true,
    position: "start",
    onDragStart: onDragStart,
    onDrop: onDrop,
    onSnapEnd: onSnapEnd,
  };

  board = Chessboard("myBoard", config);

  $("#btnstart").on("click", function () {
    board.start;
    // var href = window.location.href;
    // window.location.href = href;
    location.reload();
  });
  $("#btnflip").on("click", board.flip);

  updateStatus();
}
jQuery("document").ready(function () {
  allowlegalmoves();
});













// converting e2-e4 to e4 start here



// function onMoveEnd(move) {

//   const movepiece = move.piece;
//   let pieceFrom = "";

//   if(movepiece == "p"){
//       pieceFrom = move.to;
//   }else{
//       pieceFrom = movepiece.toUpperCase()+move.to;
//   }


//   if (move.color === 'w') {
//       moveDisplay = pieceFrom;
//   }else{
//       moveDisplay = pieceFrom;
//   }

  

//   // Check if a piece was captured
//   if (move.captured) {
//       const capturedPiece = move.captured;

//       if(movepiece == "p"){
//           pieceFrom = move.from.substring(0,1);
//       }else{
//           pieceFrom = movepiece.toUpperCase()
//       }


//       if (move.color === 'w') {
//           moveDisplay = pieceFrom +"x"+ move.to;
//       } else {
//           moveDisplay = pieceFrom +"x"+ move.to;
//       }
//       // updateCapturedPieces();
//   }

//   console.log(moveDisplay);
// }

// function makeMove(move) {
//   const gameMove = chessgame.move(move);
//   if (gameMove) {
//       onMoveEnd(gameMove);
//   } else {
//       // console.log("Invalid move.");
//   }
// }
// converting e2-e4 to e4 last here




