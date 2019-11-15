
<?

$input = '<script>alert(1);</script>';

echo htmlspecialchars($input);     //outputs &lt;script&gt;alert(1);&lt;/script&gt
echo '<br>';
echo htmlentities($input); 					 //outputs &lt;script&gt;alert(1);&lt;/script&gt

?>
<br>
<br>
<?

$str = "A 'quote' is <b>bold</b>";

echo htmlentities($str);					//A 'quote' is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES);		//A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
?>

<br>
<br>

<?php
$text = '<p>Test paragraph.</p>';
echo strip_tags($text);    					//Test paragraph.
echo "\n";
?>
