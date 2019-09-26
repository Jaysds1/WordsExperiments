<?php
session_start();

if (isset($_POST['experiments']))
    require_once 'scripts/main.php';

$_SESSION['cache'] = isset($_GET['cache']) ? $_GET['cache'] : 0;
$_SESSION['js'] = isset($_GET['js']) ? $_GET['js'] : 0;
$ex = isset($ex) ? $ex : 'none';
?>
<!DOCTYPE html>
<html <? if($_SESSION['cache'] !== 0) { ?>manifest="wordsexperiments.appcache"<? } ?>>
  <head>
    <title>Words Experiments - Experiment with words!</title>
    <meta charset="utf-8" />
    <? if ($_SESSION['js'] !== '0') { ?>
        <noscript>
        <meta http-equiv="refresh" content="0; url=index.php?js=0" />
        </noscript>
        <script src="scripts/main.js"></script>
    <? } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <link type="text/css" rel="stylesheet" href="css/mobile.css" media="screen and (min-width: 20em) and (max-width: 59em)" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00ff38">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#00ff47">
  </head>
  <body>
    <div id="sub-body">
      <header id="top">
        <a href="index.php">
          <img src="images/we_logo.png" alt="Words Experiments Logo" title="Words Experiments Logo" />
        </a>
        <h1>Words Experiments</h1>
        <p>Experimenting with words is our pleasure!</p>
      </header>
      <section>
        <article>
          <header>
            <h2>Why we like experimenting?</h2>
          </header>
          <p>
            We like experimenting with words because words are the core to making sentences, paragraphs, and stories.<br/>
            Sure letters might build a word and is the true core to be experimented with, but where's the fun in playing with
            the same letters again and again, when there's billions probably trillions of words out there to experiment with.
          </p>
        </article>
        <article>
          <header>
            <h3>Experiment Field</h3>
          </header>
          <textarea form="noJS" name="experiments" placeholder="Experimentation starts here..." required autofocus><? if (isset($pre)) echo stripslashes($_POST['experiments']); ?></textarea>
          <textarea id="tested" <? if (!isset($pre)) { ?>style="display:none;"<? } ?> readonly><? if (isset($pre)) echo stripslashes($pre); ?></textarea>
          <form id="noJS" method="post" action="#">
            <label>Experiment Type:</label><br/>
            <label><input type="radio" name="experiment" value="reverse" <? if ($ex == 'reverse') echo 'checked'; ?> required>Reverse Everything</label><br/>
            <label><input type="radio" name="experiment" value="piglatin" <? if ($ex == 'piglatin') echo 'checked'; ?> required>Pig Latin</label><br/>
            <label><input type="radio" name="experiment" value="vowels" <? if ($ex == 'vowels') echo 'checked'; ?> required>Vowels</label><br/>
            <label><input type="radio" name="experiment" value="palindrome" <? if ($ex == 'palindrome') echo 'checked'; ?> required>If Palindrome</label><br/>
            <label><input type="radio" name="experiment" value="words" <? if ($ex == 'words') echo 'checked'; ?> required>Words Count</label><br/>
            <label><input type="radio" name="experiment" value="letters" <? if ($ex == 'letters') echo 'checked'; ?> required>Letters Count</label><br/>
            <input type="submit" id="js" class="button" value="Test Experiment" />
          </form>
        </article>
        <article>
          <header>
            <h3>Feedbacks</h3>
          </header>
          <p>Coming Soon!</p>
        </article>
      </section>
      <aside>
        <article>
          <header>
            <h4>Donations</h4>
          </header>
          <p>Donations for this site is welcomed!<br/>
            Any donations would be used to operate this site and any other popular sites that I've worked on.<br/>
          </p>
          <a href="bitcoin:3QxWzWjkvfvtKPcN8zq2wg3sfaZqCU1ceR"><img src="http://jquonprojects.tk/images/bitcoin.png" alt="BitCoin Accepted"/></a>
          <a href="//paypal.me/JQuonProjects"><img src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_donate_92x26.png" alt="PayPal Accepted"/></a>
        </article>
      </aside>
      <footer>
        <p>&copy; 2013 - 2016 JQuonProjects</p>
        <nav>
          <a href="?cache=1">Cache Page?</a>
          <div>
            <h3>Our Social Profiles</h3>
            <a href="//facebook.com/JQuonProjects"><img src="http://jquonprojects.tk/images/facebook.png" alt="Our FaceBook Page" title="Our FaceBook Page"/></a>
            <a href="//twitter.com/JQuonProjects"><img src="http://jquonprojects.tk/images/twitter.png" alt="Our Twitter Page" title="Our Twitter Page"/></a>
          </div>
          <div>
            <h3>Our Terms and Policies</h3>
            <a href="privacy.html">Privacy Policy</a>
            <a href="terms.html">Terms of Service</a>
          </div>
        </nav>
      </footer>
    </div>
  </body>
</html>