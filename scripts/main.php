<?php

//Feedback Section
$ex = $_POST['experiment'];
$exs = $_POST['experiments'];
$newExs = array();

switch ($ex) {
    case 'reverse':
        $newExs[0] = strrev($exs);
        break;
    case 'piglatin':
        foreach (str_word_count($exs, 1) as $word)
            array_push($newExs, str_piglatin($word));
        break;
    case 'vowels':
        $vowels = array(
            array('a', 'e', 'i', 'o', 'u'),
            array(0, 0, 0, 0, 0),
            0
        );
        foreach (str_word_count($exs, 1) as $word)
            foreach (count_chars($word, 1) as $i => $val)
                for ($ii = 0; $ii < count($vowels[0]); $ii++)
                    if ($vowels[0][$ii] == strtolower(chr($i))) {
                        $vowels[1][$ii] ++;
                        $vowels[2] ++;
                    }
        $newExs[0] = "Vowels found: {$vowels[2]}";
        $newExs[1] = "\na's: {$vowels[1][0]}";
        $newExs[1] .= "\ne's: {$vowels[1][1]}";
        $newExs[1] .= "\ni's: {$vowels[1][2]}";
        $newExs[1] .= "\no's: {$vowels[1][3]}";
        $newExs[1] .= "\nu's: {$vowels[1][4]}";
        break;
    case 'palindrome':
        foreach (str_word_count($exs, 1) as $word) {
            $reverse = strrev($word);
            $msg = ($reverse == $word) ? 'Yes' : 'No';
            array_push($newExs, "$word - $reverse\t$msg\n");
        }
        break;
    case 'words':
        $words = array(
            count($exs),
            array()
        );
        foreach (str_word_count($exs, 1) as $word)
            if (isset($words[1][$word]))
                $words[1][$word] ++;
            else
                $words[1][$word] = 1;

        sort($words[1]);
        $newExs[0] = "Words:\t{$words[0]}";
        foreach ($words[1] as $word => $occ)
            if (isset($word))
                array_push($newExs, "\n$word:\t$occ");
        break;
    case 'letters':
        $letters = array(
            0,
            array()
        );
        foreach (str_word_count($exs, 1) as $word)
            foreach (count_chars($word, 1) as $i => $val) {
                $letters[0] ++;
                if (isset($letters[1][chr($i)]))
                    $letters[1][chr($i)] ++;
                else
                    $letters[1][chr($i)] = 1;
            }
        sort($letters[1]);
        $newExs[0] = "Letters:\t{$letters[0]}";
        foreach ($letters[1] as $l => $occ)
            if (isset($l))
                array_push($newExs, "\n$l:\t$occ");
        break;
    default:
        $newExs[0] = 'Select experiment type!';
}

$pre = '';
for ($i = 0; $i < count($newExs); $i++)
    $pre .= "{$newExs[$i]} ";

function str_piglatin($str) {
    $newStr = substr($str, 1);
    $newStr .= "-{$str[0]}ay";
    return $newStr;
}

function debug($txt) {
    if (!isset($txt))
        return;
    $txt = addslashes($txt);
    echo "<script>console.log('$txt');</script>";
}

?>