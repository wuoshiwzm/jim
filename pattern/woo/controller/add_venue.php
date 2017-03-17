<?php
namespace woo\controller;
use woo\base\RequestRegistry;

require_once 'woo/base/Registry.php';
$request = RequestRegistry::getRequest();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add_Venue</title>
</head>
<body>
<h1>Add Venue</h1>

<table>
    <tr>
        <td>
            <?php print $request->getFeedbackString("</td></tr><tr><td>") ?>

        </td>
    </tr>

</table>

<form action="AddVenue.php" method="get">
    <input type="hidden" name="submitted" value="yes"/>
    <input  type="text" name="venue_name" />
</form>

</body>
</html>

