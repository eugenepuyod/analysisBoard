var board = null;
var game = new Chess();

board = Chessboard("myBoard", "start");

$("#btnstart").on("click", function () {
  board.start;
  window.location.href = "automove.html";
});

$("#btnflip").on("click", board.flip);

$("#play").on("click", function () {
  var variant = [
    ["e2-e4"],
    ["e7-e5"],
    ["g1-f3"],
    ["b8-c6"],
    ["f1-c4"],
    ["d7-d6"],
    ["e1-g1", "h1-f1"],
    ["g8-e7"],
    ["f3-g5"],
    ["f7-f6"],
    ["c4-f7"],
    ["e8-d7"],
    ["d1-g4"],
    ["f6-f5"],
    ["e4-f5"],
    ["h7-h5"],
    ["f5-f6"],
    ["h5-g4"],
    ["f7-e6"],
    ["d7-e8"],
    ["f6-f7"],
  ];

  for (let i = 0; i < variant.length; i++) {
    setTimeout(function timer() {
      if (variant[i][1]) {
        board.move(variant[i][0], variant[i][1]);
      } else {
        board.move(variant[i][0]);
      }
    }, i * 1000);
  }
});
