package tk.wordsexperiments.java;

import java.util.Scanner;

/**
 * A class for experimenting with words.
 *
 * @author Jaiquon Smith
 * @version 1.0.0
 */
public class WordsExperiments {
    
    /**
     * Original String
     * New String
     */
    private static String orgString = "", newString = "";
    
    /**
     * A default constructor.
     */
    public WordsExperiments() {}
    
    /**
     * A default WordsExperiment constructor with a specified String to 
     * experiment with.
     * 
     * @param orgString The string to start experimenting with
     */
    public WordsExperiments(String orgString) {
        setString(orgString);
    }
    
    /** 
     * Change String for different experimenting
     * 
     * @param orgString The string to experiment with
     * @exception IllegalArgumentException String is empty
     */
    public void setString(String orgString) {
        if(orgString.isEmpty())
            throw new IllegalArgumentException("Invalid value for string");
        this.orgString = orgString;
    }
    
    /**
     * Current string you're experimenting with
     * 
     * @return the current string being experimented with
     */
    public String getOriginalString() {
        return orgString;
    }
    
    /**
     * Get new tested experiment
     * 
     * @return the new experimented String
     */
    public String getNewString() {
        return newString;
    }
    
    /**
     * Reverse every word and paragraph
     */
    public void reverse() {
        String[] words = orgString.split(" ");
        for(String word : words){
            for(int i = word.length()-1; i >= 0; i--)
                newString += word.charAt(i);
            newString += " ";
        }
    }
    
}