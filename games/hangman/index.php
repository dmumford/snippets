<?php

    $wordList;
    // alphabet array
    $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    /* METHOD 1 - pick a random word from a .txt file **/
    $file = "words.txt";
    $f_contents = file($file); 
    $word_spaces = strtoupper(trim(strval($f_contents[rand(0, count($f_contents) - 1)])));
    $word = str_replace(' ', '', $word_spaces);

    /* METHOD 2: pick a word from array $wordList
    function getWord()
    {
        //$wordList = ['apple','banana','pear','pineapple','watermelon','lemon','lime','strawberry','coconut','avocado','lychee'];
        $random = array_rand($wordList); 
        $word = strtoupper($wordList[$random]);
        return $word;
    }

    // set $word to random string
    $word = getWord();
    */
    

?>

<!doctype html>
<html lang="en-gb">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/game.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

    <div id="container">

        <h1 class="title">Hangman (Countries)</h1>

        <div id="word2guess">
        <?php 
            // split word to guess into its characters
            $letters = str_split($word);

            // create a button element for each letter in word
            foreach ($letters as $letter)
            {
                echo '<button class="letter '.$letter.'" value="_">&nbsp;</button>';
            }

        ?>
        </div>

        <div id="letters">
        <?php

            // Create a button for each letter in alphabet (used to guess a letter)
            foreach ($alphabet as $letter)
            {
                echo '<button class="letter alphabet" value="'.$letter.'">'.$letter.'</button>';
            }

        ?>
        </div>
        
            <div id="guessed">


            </div>

            <div id="buttons">
                <a href="index.php"><button><span style="font-size:2em;">&#8635;</span></button></a>
                <button id="guesses">Guesses 0</button>
                <button id="stats">Good Luck!</button>
            </div>


        <script>
            word = '<?php echo $word; ?>';
            word_spaces = <?php echo "'".$word_spaces."'"; ?>;
            // guessed letters
            guessed = $('#guessed').val();

            // guessed letters
            guessed_array = ['&'];

            guesses = 0;

            incorrect = 0;

            in_play = 1;

            // when user clicks a letter of alphabet
            // send guessed letter to check.php
            // responses: 'in word', 'not in word', or 'already guessed'
            $(document).ready(function(){

                    // user can click letters to guess
                    $('button.alphabet').click(function(){

                        if (in_play == 1)
                        {

                            var letter = $(this).val();

                            $.ajax ({
                            type: "POST",
                            url:"check.php",
                            dataType:'text',
                            data: {'letter':letter,'word':word, 'guessed':guessed_array},
                            success: function(response) {

                                // Response from PHP script
                                switch (response)
                                {
                                    case 'in word':
                                        console.log(response);
                                        $('.'+letter).text(letter);
                                        $('.'+letter).addClass('correct');
                                        if(jQuery.inArray(letter, guessed_array) == -1)
                                        {
                                            $('#guessed').append('    '+letter);
                                            guessed_array.push(letter);
                                        }
                                        guesses++;
                                        $('#guesses').text('Guesses: '+guesses);
                                        $("[value="+letter+"]").addClass('guessed');
                                        check();
                                        break;

                                    case 'not in word':
                                        console.log(response);
                                        if(jQuery.inArray(letter, guessed_array) == -1)
                                        {
                                            $('#guessed').append('    '+letter);
                                            guessed_array.push(letter);
                                            $("[value="+letter+"]").addClass('guessed');
                                            incorrect++;
                                        }
                                        guesses++;
                                        check();
                                        $('#guesses').text('Guesses '+guesses);
                                        break; 

                                    case 'already guessed':
                                        console.log(response);
                                        break;
                                    
                                    default:
                                        //console.log(response);
                                        break;
                                }

                            }
                            });

                        }

                    });

                    // user can press letters on keyboard to guess
                    $(document).keypress(function(e) {

                        if (in_play == 1)
                        {

                            var alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
                            var charTyped = String.fromCharCode(e.which);
                            if (/[a-z\d]/i.test(charTyped)) {
                                charTyped = charTyped.toUpperCase();
                                //console.log(charTyped);
                            }
                            // Check that keypress is a Letter
                            if(jQuery.inArray(charTyped, alphabet) !== -1)
                            {


                            var letter = charTyped;

                            $.ajax ({
                            type: "POST",
                            url:"check.php",
                            dataType:'text',
                            data: {'letter':letter,'word':word, 'guessed':guessed_array},
                            success: function(response) {

                                // Response from PHP script
                                switch (response)
                                {
                                    case 'in word':
                                        console.log(response);
                                        $('.'+letter).text(letter);
                                        $('.'+letter).addClass('correct');
                                        if(jQuery.inArray(letter, guessed_array) == -1)
                                        {
                                            $('#guessed').append('    '+letter);
                                            guessed_array.push(letter);
                                            $("[value="+letter+"]").addClass('guessed');
                                        }
                                        guesses++;
                                        $('#guesses').text('Guesses: '+guesses);
                                        check();
                                        break;

                                    case 'not in word':
                                        console.log(response);
                                        if(jQuery.inArray(letter, guessed_array) == -1)
                                        {
                                            $('#guessed').append('    '+letter);
                                            guessed_array.push(letter);
                                            $("[value="+letter+"]").addClass('guessed');
                                        }
                                        guesses++;
                                        incorrect++;
                                        check();
                                        $('#guesses').text('Guesses '+guesses);
                                        break; 

                                    case 'already guessed':
                                        console.log(response);
                                        break;
                                    
                                    default:
                                        //console.log(response);
                                        break;
                                }

                            }
                            });

                            }
                        }

                    });
                        

                    function check()
                    {
                        construct = '';
                        $( "#word2guess button" ).each(function( index ) {
                            construct = construct + $(this).text() ;
                        });
                        console.log('Incorrect guesses:' + incorrect);
                        if ( incorrect >= 6 )
                        {
                            in_play = 0;
                            $('#stats').text('GAME OVER!');
                            $('#stats').addClass('lose');

                            $('#word2guess').html(word_spaces);
                            $('#letters').html('<img src="flags/'+word_spaces+'.png" alt="'+word_spaces+' flag" />');
                            $('#guessed').remove();

                            // delete game elements so user cannot continue game
                            $('#guessed').remove();


                        }
                        if ( construct == word )
                        {
                            in_play = 0;
                            $('#stats').text('WELL DONE!');
                            $('#stats').addClass('correct');

                            $('#letters').html('<img src="flags/'+word_spaces+'.png" alt="'+word_spaces+' flag" />');
                            $('#guessed').remove();
                        }
                    }



            });
        </script>


    </div>

</body>
</html>