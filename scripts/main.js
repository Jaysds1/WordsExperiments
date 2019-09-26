/*
 Account System:
 * Load up GUI
 * Load up user account (if signed in)
 Feedback System:
 * Load up GUI
 * Load up feedbacks
 */
window.onload = (function () {
    document.getElementById("js").onclick = (function (e) {
        var ex = document.getElementsByName("experiment"), //Get selections of input
                exs = document.getElementsByName("experiments")[0].value.trim().split(" "), //Get users input and split into word by word
                newExs = []; //Experiment Outcome
        //Now get the selected input
        for (var i = 0; i < ex.length; i++)
            if (ex[i].checked === true) {
                ex = ex[i].value;
                break;
            }
        if (typeof ex === "object" || exs === "") //incase of any strange error
            return;

        //Check which selected input was selected
        switch (ex) {
            case "reverse":
                for (var i = 0; i < exs.length; i++)
                    newExs.push(exs[i].reverse());
                newExs.reverse();
                break;
            case "piglatin":
                for (var i = 0; i < exs.length; i++)
                    newExs.push(exs[i].piglatin());
                break;
            case "vowels":
                var vowels = [ //A vowel table, counter, and total counter
                    ['a', 'e', 'i', 'o', 'u'],
                    [0, 0, 0, 0, 0],
                    0
                ];
                for (var i = 0; i < exs.length; i++) //Words Loop
                    for (var v = 0; v < exs[i].length; v++)//Letters Loop
                        for (var iv = 0; iv < vowels[0].length; iv++)//Vowel Loop
                            if (vowels[0][iv] === exs[i][v].toLowerCase()) {
                                //After vowel check add to the counters
                                vowels[1][iv]++;
                                vowels[2]++;
                            }
                
                //Display Result
                newExs[0] = "Vowels found: " + vowels[2];
                newExs[1] = "\na's: " + vowels[1][0];
                newExs[1] += "\ne's: " + vowels[1][1];
                newExs[1] += "\ni's: " + vowels[1][2];
                newExs[1] += "\no's: " + vowels[1][3];
                newExs[1] += "\nu's: " + vowels[1][4];
                break;
            case "palindrome":
                for (var i = 0; i < exs.length; i++) {
                    var reverse = exs[i].reverse(), //Reverse Word
                            msg = "No";
                    if (reverse === exs[i]) //Is the word spelt the same?
                        msg = "Yes";
                    newExs.push(exs[i] + " - " + reverse + "\t" + msg + "\n");
                }
                break;
            case "words":
                //Count Words
                var words = [
                    exs.length,
                    []
                ];
                for (var i = 0; i < words[0]; i++) {
                    //Check if word is defined already
                    if (typeof words[1][exs[i]] === "number")
                        words[1][exs[i]]++;
                    else //If it's not then set it as 1
                        words[1][exs[i]] = 1;
                }
                words[1].sort(); //Sort Array
                newExs[0] = "Words:\t" + words[0];
                for (var word in words[1])
                    if (word !== "undefined")
                        newExs.push("\n" + word + ":\t" + words[1][word]);
                
                break;
            case "letters":
                var letters = [
                    0,
                    []
                ];
                for (var i = 0; i < exs.length; i++)
                    for (var ii = 0; ii < exs[i].length; ii++) {
                        letters[0]++;
                        if (typeof letters[1][exs[i].charAt(ii)] === "number")
                            letters[1][exs[i].charAt(ii)]++;
                        else
                            letters[1][exs[i].charAt(ii)] = 1;
                    }
                letters[1].sort(); //Sort Array
                newExs[0] = "Letters:\t" + letters[0];
                for (var letter in letters[1])
                    if (letter !== "undefined")
                        newExs.push("\n" + letter + ":\t" + letters[1][letter]);
                break;
            default:
                newExs[0] = "Select a type of experiment to perform!";
        }

        //Output new experiment outcome
        var pre = document.getElementById("tested");
        if (pre.style.display === "none")
            pre.style.display = "block";
        else
            pre.innerHTML = "";
        for (var i = 0; i < newExs.length; i++)
            pre.innerHTML += newExs[i] + " ";

        e.preventDefault();
    });
});

String.prototype.reverse = (function () {
    var newString = "";
    for (var i = this.length - 1; i >= 0; i--)
        newString += this.charAt(i);
    return newString;
});
String.prototype.piglatin = (function () {
    var begChar = this.charAt(0);
    var newString = this.substring(1, this.length);
    newString += "-" + begChar + "ay";
    return newString;
});