<?php
// multiple recipients
$to  = 'grygrflzr@hotmail.com';

// subject
$subject = 'New Mod Request';

// message
$message = '
<html>
<head>
  <title>New Mod Request</title>
</head>
<body>
  <p>A request for <strong>Glowstone Wire</strong> has been submitted.</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: GrygrFlzr <grygrflzr@hotmail.com>' . "\r\n";
$headers .= 'From: MCF Modlist <notice@modlist.mcf.li>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>