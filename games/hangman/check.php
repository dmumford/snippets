<?php
    // alphabet array
    $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    // when user clicks a button
    if ( $_POST['letter'] && $_POST['word'] && $_POST['guessed']  )
    {
        $guessedLetters = $_POST['guessed'];
        $l = $_POST['letter'];
        $word = $_POST['word'];
        $word_array = str_split($word);

        if ( in_array($l, $guessedLetters) )
        {

            $_POST['letter']=null;
            echo 'already guessed';
            exit();
        }
        else
        {
            /* 
                check if letter is in word.
                if it is, reveal letters.
                add letter to $guessedLetters.
                check if word has been guessed.
            */
            $letter = strtoupper($l);

            // if letter is in word
            if ( in_array( $l, $word_array ) )
            {
                // reveal letter
                array_push($guessedLetters, $l);

                $_POST['letter']=null;
                echo 'in word';
                exit();
            }
            else
            {
                $_POST['letter']=null;
                echo 'not in word';
                exit();
            }
        }
        
    }


?>