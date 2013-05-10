<?php
$key =  md5(uniqid(rand() . $_SESSION['usr'], true));
echo "Your API key will be:<pre>" . $key . "</pre>";
echo "In IRC, type<pre>/msg GrygrFlzr APIKEY:" . $_SESSION['usr'] . ":" . crypt(urlencode($key), '$2a$13$Ilvd3cy/SKPyJfpKFnqqzw==') . "</pre>";
echo "Example Usage:<pre>http://modlist.mcf.li/api.php?key=<strong>" . $key . "</strong>&amp;request=json&amp;version=1.5.2</pre>";
?>
Read the <a href="../list/api_docs/">API documentation</a> for more details.
NOTE: We do NOT store the API key in our database, we will only keep the encrypted version that you send to GrygrFlzr.</br>
This encryption is <strong>one way only</strong>. We cannot recover the key if you lose it, you will have to generate a new key and send it again.</br>
</br>
<a href="panel.php?view=api&mode=generate">Click here to Generate a New Key</a>