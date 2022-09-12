<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CEB Crypto Sim </title>
    <link rel="stylesheet" type="text/css" href="customAlgorithm.css"> 
</head>
<body>
    <div class="menuBar">
        <button type="button" onclick="window.open('index.html', '_self')"> Crypto Sim </button>
        <button type="button" onclick="window.open('ciphers.html', '_self')"> Ciphers </button>
        <button type="button" onclick="window.open('aesDes.html', '_self')"> AES/DES </button>
        <button type="button" id="current" onclick="window.open('customAlgorithm.html', '_self')"> Build Your Own Algorithm </button>
    </div>

    <div id="title">
        <h1> Build Your Own Encryption Algorithm! </h1>
        <p> Using the dropwdowns below, assemble your own, custom encryption algorithm. For each mathematical operation, you can choose
            by how much you want to change the numerical ASCII value. You can use the 'Add More' button to add additonal operations. 
            This allows you to make the algorithm as simple or as a complex as your would like. From there, follow the arrows
            to guide you and help you encode or decode your text. Use the percentage bar to experiment and see what effects the complexity 
            of your algorithm and what you can do to make it more secure. Good luck!
        </p>
    </div>

    <?php
        $message = $_POST["input"];
        $messageChars = str_split($message);
        $enDecode = $_POST["enDecode"];
        $multiply = $_POST["multiply"];
        $divide = $_POST["divide"];
        $add = $_POST["add"];
        $subtract = $_POST["sub"];
    ?>

    <div id="sim">
        <!-- options for  -->
        <div id="settings">
        <h2> SETTINGS: </h2>
            <form action="customAlgorithm.php" method="POST">
                <label for="enDecode"> Encode/Decode </label>
                <select name="enDecode" id="enDecode">
                    <option value=""></option>
                    <option value="encode">Encode</option>
                    <option value="decode">Decode</option>
                </select>

                <label for="multiply"> Multiply </label>
                <select name="multiply" id="multiply">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>

                <label for="divide"> Divide </label>
                <select name="divide" id="divide">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>

                <label for="add"> Add </label>
                <select name="add" id="add">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>

                <label for="sub"> Subtract </label>
                <select name="sub" id="sub">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                </select>
                <br>

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
        if (isset($_POST["submit"])) {
            $newMessage = "";
            foreach ($messageChars as $char) {
                $ascii = ord($char);
                if ($enDecode = "encode") {
                    $ascii = ($multiply != "") ? ($ascii * $multiply) : $ascii;
                    $ascii = ($divide != "") ? ($ascii * $divide) : $ascii;
                    $ascii = ($add != "") ? ($ascii * $add) : $ascii;
                    $ascii = ($subtract != "") ? ($ascii * $subtract) : $ascii;
                    $ascii = ($ascii % 127) + 33;
                    $newMessage = $newMessage . chr($ascii);
                } else if ($enDecode = "decode") {
                    // add code to decode 
                }
            }
            // prints back intial message encrypted data
            echo '<script type="text/JavaScript"> 
                var x = document.getElementById("output");
                x.value = "' . $newMessage . '";

                var y = document.getElementById("input");
                y.value = "' . $message . '";
                </script>'
            ;
        }

    ?>

</body>
</html>