<?php

namespace App\Livewire;

use Livewire\Component;

class StockfishComponent extends Component
{
    public $analysis;
    public $bestmove = "";
    public $stockfish_path = 'stockfish.exe';
    public $fen;
    public $best_move;
    public $testcontent = "";
    public $inputValue; 
    public $filster_best_move;
    public $getAllNotations = [];
    public $counter = 0;
    public $toggleFlip;

    protected $listeners = ['updateInputValue','toggleUpdated' => 'updateToggle'];

    public function updateInputValue($value)
    {
        $this->inputValue = $value;  // Update the property with the received value
        $this->fen = $value;

    }

    public function updateToggle($value)
    {
        $this->toggleFlip = $value;
    }
    

    public function callMethod(){
    
        // FEN string (position to analyze)
        // $this->fen = 'rnbqkbnr/pppp1ppp/8/4p3/4P3/5N2/PPPP1PPP/RNBQKB1R b';
        // $this->fen = $value;
        // Initialize process and pass the FEN to Stockfish
        $process = proc_open($this->stockfish_path, [
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
            fwrite($pipes[0], "position fen $this->fen\n");

            // Limit the time for analysis to 1000 milliseconds (1 second)
            fwrite($pipes[0], "go movetime 1000\n");  // 1000 ms = 1 second

            // Buffer to collect the output
            $output = '';

            // Read the output from Stockfish
            while ($line = fgets($pipes[1])) {
                // Append each line to output for debugging
                $output .= $line . "\n";

                // Check for the best move
                if (strpos($line, 'bestmove') !== false) {
                    // Extract the best move (substring after "bestmove")
                    $this->best_move = trim(substr($line, 9));
                    $this->counter++;
                    // $this->filster_best_move = trim(substr($line, 9));
                    // echo "Best Move: " . $this->best_move . "\n";
                    break;
                }
            }

            // Output the entire response for debugging
            // echo "Full Output from Stockfish:\n" . $output;
            
            // eugene custom added start here
            // preg_match_all('/^info depth .+/m', $output, $matches);
            
            preg_match_all('/score cp (-?\d+)\s+nodes (\d+)\s+nps (\d+)\s+hashfull (\d+)\s+tbhits (\d+)\s+time (\d+)\s+pv ([^\r\n]+)/', $output, $matches);
            $allMoveNotationArray = [];
            foreach ($matches[0] as $index => $match) {
                $allMoveNotationArray[] = [
                    'score_cp' => $matches[1][$index],  // score cp value
                    'nodes'    => $matches[2][$index],  // nodes value
                    'nps'      => $matches[3][$index],  // nps value
                    'hashfull' => $matches[4][$index],  // nps value
                    'tbhits'   => $matches[5][$index],  // nps value
                    'time'     => $matches[6][$index],  // nps value
                    'pv'       => $matches[7][$index],   // pv value
                ];
            }
            
            $this->getAllNotations = $allMoveNotationArray;
            
            $string = $this->best_move;
            $checkmateWord = "";
            
            if($string !== "(none)"){
                // preg_match('/\b[a-h][1-8][a-h][1-8]\b/', $string, $matches);
                // $formattedMove = implode('-', str_split($matches[0], 2));

                $getOdd = "";
                if($this->counter % 2 !== 0){
                    $getOdd = "<span class='bestmovebg bestbgw'></span>";
                }else{
                    $getOdd = "<span class='bestmovebg bestbgb'></span>";
                }
                $explodestring = explode(" ", $string); 
                $moveStart = substr($explodestring[0], 0, 2);
                $moveEnd = substr($explodestring[0], 2, 2);
                $formattedMove = "<span class='bestmovespan'>Best move is </span>".$getOdd." <pan>".$moveStart . '-' . $moveEnd."</span>";
                if(count($explodestring) === 1){
                    $checkmateWord = "<span class='bestmovecmate'>, checkmate!</span>";
                }


            }else{
                $formattedMove = "<span class='bestmovegover'>Geme over, checkmate!</span>";
                
            }

            $this->filster_best_move = $formattedMove."".$checkmateWord;

            // eugene custom added last here


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
        return view('livewire.stockfish-component');
    }
}
