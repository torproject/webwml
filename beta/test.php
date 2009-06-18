<?php
$pagename = "Tor: anonymity online";
include("zedheader.inc.php");
?>
<div class="main-column"> 

<form action="../styleswitch.php" method="post">
<select name="set">
<option value="zedstylesheet-ltr" selected>Light</option>
<option value="black-zedstylesheet-ltr">Dark</option>
</select>
<input type="submit" value="Change Style">
</form>


</div>
<!-- #main -->
<?php

include("footer.inc.php");

?>
