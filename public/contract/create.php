<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Add a Contract";
$current = "contract";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.
//get the persons id - id
$blogid = $_GET['blogid'] ?? false;

if(is_post_request()) {

    $blogid = $_POST['blogid'];
    $paymentDate = $_POST['paymentDate'];
    $paymentAmt = $_POST['paymentAmt'];
    $contractLength = $_POST['contractLength'];

    $date  = date_create($paymentDate);
    date_add($date, date_interval_create_from_date_string("$contractLength months"));
    $endContract = date_format($date, "Y-m-d");

    // create an array called args to be used with __construct
    $args = [];
    $args['blogid'] = blogid;
    $args['paymentDate'] = $paymentDate;
    $args['paymentAmt'] = $paymentAmt;
    $args['contractLength'] = $contractLength;
    $args['endContract'] = $endContract;

    //instantiate a new object and use the save function to create.
    $contract = new Contract($args);
    $contract->create();

    //after saving redirect back to home page.
    header("Location: index.php?blogid=$blogid");

}

?>

 <section id="boxes">
      <div class="container">
          <form action="create.php" method="post">
            <fieldset>
              <legend>Add a Contract</legend>
              <input name="blogid" type="hidden" value="<?php echo $blogid;?>">
              <p>Payment Date: <input type="date" name="paymentDate"></p>
              <p>Payment Amount: <input type="text" name="paymentAmt"></p>
              <p>Length of Contract in Months: <input type="number" name="contractLength" min="1" max="36"></p>
              <button type="submit" value="Submit">Submit</button>
              <button type="reset" value="Reset">Reset</button>
            </fieldset>
          </form>


      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
