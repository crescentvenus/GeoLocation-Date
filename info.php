<HTML>
<meta charset=“UFT-8”>
<title>CSS</title>
<style>
body {
background: #eeeeee;
font-family: Meiryo;
}
div {
background: #f0e0e0;
font-family: Meiryo;
width: 350px;
padding: 10px;
text-align: left;
border: 1px solid #cccccc;
}
</style>
</head>
<BODY>
<script type="text/javascript">
  if (navigator.geolocation) {
    // Get geolocation info.
    navigator.geolocation.getCurrentPosition(
      // Sucsess
      function (pos) {
        var sc = 100000;
        var Location = Math.round(pos.coords.latitude  * sc)/sc
               + ',' + Math.round(pos.coords.longitude * sc)/sc;
        D = new Date();
        Year    = D.getFullYear();
        Month   = ('000' + (D.getMonth() +1)).slice(-2);
        Day     = ('000' + D.getDate()).slice(-2);
        Hours   = ('000' + D.getHours()).slice(-2);
        Minutes = ('000' + D.getMinutes()).slice(-2);
        Seconds = ('000' + D.getSeconds()).slice(-2);
        Date = Year + '/' + Month + '/' + Day + ' '
             + Hours + ':' + Minutes + ':' + Seconds ;
        form.location.value = Location ;
        form.date.value     = Date ;
      },
      // Fail
      function (error) {
        window.alert("Error:" + error.code);
      }
    );
  } else {
    window.alert("Geolocation not suported.");
  }
</script>
<form name="mainForm" action="info.php" method="POST"><div>
        <input type="TEXT" name="location" size="16">
        <input type="TEXT" name="date" size="16">
        <input type="SUBMIT" name="submit" value="SET"></div>
</form>
<script language="JavaScript">
        var form = document.forms.mainForm;
        var LatLng = form.location.value;
        var date   = form.date.value;
</script>
<?php
        if(isset($_POST['location'])){
                $loc  = $_POST['location']."\n";
                $date = $_POST['date']."\n";
                echo "<div>";
                echo "Location  : $loc<bR>";
                echo "Date&Time : $date";
                echo "</div>";
                $fp=fopen("/tmp/LatLng","w");
                fwrite($fp,$loc);
                fclose($fp);
                $fp=fopen("/tmp/date","w");
                fwrite($fp,$date);
                fclose($fp);
        }
?>
</BODY>
</HTML>
