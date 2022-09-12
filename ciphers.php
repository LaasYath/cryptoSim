<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CEB Crypto Sim </title>
    <link rel="stylesheet" type="text/css" href="ciphers.css"> 
</head>
<body>
<div class="menuBar">
        <button type="button" onclick="window.open('http:\/\/127.0.0.1:5500/index.html')"> Crypto Sim </button>
        <button type="button" id="current" onclick="window.open('http:\/\/localhost:81/cryptoSim/ciphers.php', '_self')"> Ciphers </button>
        <button type="button" onclick="window.open('http:\/\/localhost:81/cryptoSim/customAlgorithm.php', '_self')"> Build Your Own Algorithm </button>
    </div>

    <?php
        if (isset($_POST["submit"])) {
            $newMessage = "";
            $cipherType = $_POST["commonCipher"];
            if ($cipherType == "caesar") {
                $message = $_POST["input"];
                $shift = $_POST["shift"];
                $alphabet = array();
                foreach (range('a', 'z') as $letter) {
                    array_push($alphabet, $letter);
                }
                $message = strtolower($message);
                $lsMessage = str_split($message);
                foreach ($lsMessage as $ogLetter) {
                    $index = array_search($ogLetter, $alphabet);
                    $index += $shift;
                    $newMessage = $newMessage . $alphabet[$index];
                }
            } 
            // else if {
                // code for other cipher options here
            // }

            echo '<script type="text/JavaScript">
                var output = document.getElementById("output");
                output.value = "' . $newMessage . '";

                var input = document.getElementById("input");
                input.value = "' . $lsMessage . '";
            </script>';
        }
    ?>

    <div id="sim">
        <!-- common ciphers -->
        <div id="cipherOptions">
        <h2> CIPHERS: </h2>
            <form action="ciphers.php" method="POST">
            <input type="radio" id="caesar" name="commonCipher" value="caesar"
                <?php if($cipherType == "caesar") {
                    echo "checked";
                } ?>
            > <label for="html"> Caesar</label>
            <input type="text" id="shift" name="shift" placeholder="Shift...">
            <input type="radio" id="vigenere" name="commonCipher" value="vigenere"> <label for="css">Vigenere</label>
            <input type="radio" id="homophonic" name="commonCipher" value="homophonic"> <label for="javascript">Homophonic</label>
            <input type="radio" id="polygram" name="commonCipher" value="polygram"> <label for="javascript">Polygram</label>
            <input type="radio" id="monoalphabetic" name="commonCipher" value="monoalphabetic"> <label for="javascript">Monoalphabetic</label>

            <input type="submit" name="submit" id="submit" value="Convert">
            <hr>
        </div>

        <div id="messages">
                <textarea class="message" id="input" name="input" placeholder="Input..."></textarea>

            </form>
            <h1 id="arrow"> &#8594 </h1>
            <textarea  class="message" id="output" name="output" placeholder="Output..."></textarea>
        </div>
    </div>

    <?php
        echo '<script type="text/JavaScript">
        var output = document.getElementById("output");
        output.value = "' . $newMessage . '";

        var input = document.getElementById("input");
        input.value = "' . $message . '";
    </script>';
    ?>

</body>
</html>