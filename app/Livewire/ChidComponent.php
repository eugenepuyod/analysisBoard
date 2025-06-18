<?php

namespace App\Livewire;

use Livewire\Component;

class ChidComponent extends Component
{
    public $aIstockfish_path = 'stockfish.exe';
    public $aiFen;
    public $aiBestMove;
    public $filterBestMove;
    public $aiMoveStart;
    public $aiMoveEnd;
    public $aiRandomLevel;
    public $counter = 0;
    public $playing = 0;
    public $checkmateMessage;
    public $selectcolor = 'white';
    public $selectOponent = [
        1 => 'Railly noobs', 
        2 => 'Dhyxcel noobs',
        10 => 'Mama Sabaan',
        100 => 'Dodong Luis Guapo',
        150 => 'Mr. Don Brandon Pakboy',
        300 => 'Ate Chelsey Laagan',
        500 => 'Ate Venice Maldita',
        1000 => 'Papa Hilumon',
    ];

    protected $listener = ['updateAiFen'];

    public function mount(){
        $shuffleArray = [1, 2, 10, 50, 100, 150, 300, 500, 1000];
        shuffle($shuffleArray);
        $luckyNumber = array_slice($shuffleArray,0,10);
        // $this->aiRandomLevel = $luckyNumber[0];
        // $this->aiRandomLevel = 1;

        $this->aiRandomLevel = 1;
        
    }

    public function updateAiFen($value){
        $this->aiFen = $value;
    }

    public function updateSelectcolor($value){
        $this->selectcolor = $value;
    }

    public function getplaying(){
        $this->playing = 1;
    }

    public function chessBotInit(){
        // Initialize process and pass the FEN to Stockfish
        $process = proc_open($this->aIstockfish_path, [
            0 => ["pipe", "r"],  // stdin
            1 => ["pipe", "w"],  // stdout
            2 => ["pipe", "w"]   // stderr
        ], $pipes);

        if (is_resource($process)) {
            // Send the UCI command to initialize the engine
            fwrite($pipes[0], "uci\n");

            // Wait for the "uciok" message from Stockfish
            // while (fgets($pipes[1]) !== "uciok\n");

            // // Send the isready command to confirm Stockfish is ready
            // fwrite($pipes[0], "isready\n");
            // while (fgets($pipes[1]) !== "readyok\n");

            // Immediately set the FEN position
            fwrite($pipes[0], "position fen $this->aiFen\n");

            // Limit the time for analysis to 1000 milliseconds (1 second)
            fwrite($pipes[0], "go movetime $this->aiRandomLevel\n");  // 1000 ms = 1 second

            // Buffer to collect the output
            $output = '';

            // Read the output from Stockfish
            while ($line = fgets($pipes[1])) {
                // Append each line to output for debugging
                $output .= $line . "\n";

                // Check for the best move
                if (strpos($line, 'bestmove') !== false) {
                    // Extract the best move (substring after "bestmove")
                    $this->aiBestMove = trim(substr($line, 9));
                    // echo "Best Move: " . $best_move . "\n";
                    break;
                }
            }
            

            // Output the entire response for debugging
            // echo "<pre>";
            // echo "Full Output from Stockfish:\n" . $output;


            $getBestMove = $this->aiBestMove;
            $checkmateWord = "";
            
            if($getBestMove !== "(none)"){
                // preg_match('/\b[a-h][1-8][a-h][1-8]\b/', $string, $matches);
                // $formattedMove = implode('-', str_split($matches[0], 2));

                // $getOdd = "";
                // if($this->counter % 2 !== 0){
                //     $getOdd = "<span class='bestmovebg bestbgw'></span>";
                // }else{
                //     $getOdd = "<span class='bestmovebg bestbgb'></span>";
                // }
                $explodestring = explode(" ", $getBestMove); 
                $moveStart = substr($explodestring[0], 0, 2);
                $moveEnd = substr($explodestring[0], 2, 2);
                $finalMove = $moveStart.'-'.$moveEnd;

                $this->aiMoveStart = $moveStart;
                $this->aiMoveEnd = $moveEnd;

                // $formattedMove = "<span class='bestmovespan'>Best move is </span>".$getOdd." <pan>".$moveStart . '-' . $moveEnd."</span>";
                if(count($explodestring) === 1){
                    $checkmateWord = "checkmate";
                }


            }else{
                // $formattedMove = "<span class='bestmovegover'>Geme over, checkmate!</span>";
                $finalMove = "mate";
            }

            $this->filterBestMove = $finalMove;
            $this->checkmateMessage = $checkmateWord;

            // Close the process
            fclose($pipes[0]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);
        } else {
            
        }
    }

    public function render()
    {
        return view('livewire.chid-component');
    }
}
