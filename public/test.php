<?php

    // Path to the Stockfish binary (make sure to provide the full path)
    // $this->stockfish_path = asset('ssscript/stockfish.exe');
    $stockfish_path = 'stockfish.exe';


    // FEN string (position to analyze)
    $fen = 'r1bqkbnr/pp1ppp1p/2n3p1/2p5/2P5/5NP1/PP1PPP1P/RNBQKB1R w KQkq - 1 4';

    // Initialize process and pass the FEN to Stockfish
    $process = proc_open($stockfish_path, [
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
        fwrite($pipes[0], "position fen $fen\n");

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
                $best_move = trim(substr($line, 9));
                echo "Best Move: " . $best_move . "\n";
                break;
            }
        }

        // Output the entire response for debugging
        // echo "<pre>";
        echo "Full Output from Stockfish:\n" . $output;
        // dd("test: ".$output);

        // Close the process
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
    } else {
        dd("Failed to start Stockfish.\n");
    }

?>