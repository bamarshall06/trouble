<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Reports Page";
$current = "report";
include(SHARED_PATH . '/public_header.php');

?>
<section id="boxes">
     <div class="container">
        <br>
        <h2>Report Page</h2>

<?php

// how much did we spend this month
$month = date(m);

$sql = "SELECT sum(paymentAmt) as paymentAmt FROM contract WHERE month(paymentDate) = {$month};";

      $amount = Contract::find_by_sql($sql);

      echo "<p>1. How much $$$ did we spend this month on Blog Advertising? ";

      foreach($amount as $amt)
      {echo $amt->paymentAmt; }

      echo "</p>";

// highest quality blog with a contract count of 0
$sql = "SELECT blogName
          FROM blog
          WHERE blogid NOT IN (SELECT blogid FROM contract)
            ORDER BY qualityScore DESC
              LIMIT 1";

      $blogs = Blog::find_by_sql($sql);

      echo "<p>2. Who is our next biggest potential blogger to contact? ";

      foreach($blogs as $blog)
      {echo $blog->blogName . "</p>";}

// show all blogs that have a contract that is expired

// get contract length

$sql = "SELECT blogName
          FROM blog
            WHERE blogid
            NOT IN (SELECT blogid
                FROM contract
                    WHERE endContract > CURRENT_DATE)
            GROUP BY blogName;";

      $expired = Blog::find_by_sql($sql);

      echo "<p>3. Who is out of contract that needs to get paid? ";

      foreach($expired as $exp)
      { echo $exp->blogName . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        "; }

      echo "</p>";


?>






      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
