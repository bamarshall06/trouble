<?php
require_once("../../private/initialize.php");
require_login();
$page_title = "Create Blog Page";
$current = "blog";
include(SHARED_PATH . '/public_header.php');

// if form has been submitted get variables and calculate numbers then
// set them to the array.

if(is_post_request()) {
    // get post variables
    $blogName = $_POST['blogName'];
    $url = $_POST['url'];
    $email = $_POST['email'];
    $contactFName = $_POST['contactFName'];
    $contactLName = $_POST['contactLName'];
    $mozDA = $_POST['mozDA'];
    $sponsors = $_POST['sponsors'];
    $fqshop = $_POST['fqshop'];
    $gfairy = $_POST['gfairy'];
    $mstar = $_POST['mstar'];

    $qualityScore = Blog::qualScore($mozDA, $sponsors, $fqshop, $gfairy, $mstar);

    //create an array called args to be used with __construct
    $args = [];
    $args['blogName'] = $blogName;
    $args['url'] = $url;
    $args['email'] = $email;
    $args['contactFName'] = $contactFName;
    $args['contactLName'] = $contactLName;
    $args['qualityScore'] = $qualityScore;
    $args['mozDA'] = $mozDA;
    $args['sponsors'] = $sponsors;
    $args['fqshop'] = $fqshop;
    $args['gfairy'] = $gfairy;
    $args['mstar'] = $mstar;

    //instantiate a new object and use the save function to create.
    $blog = new Blog($args);
    $blog->create();

    //after saving redirect back to home page.
    header('Location: index.php');

}

?>

 <section id="boxes">
      <div class="container">
          <form action="create.php" method="post">
            <fieldset>
              <legend>Add a Blog</legend>
              <p>Blog Name: <input type="text" name="blogName"></p>
              <p>URL: <input type="text" name="url"></p>
              <p>Email: <input type="text" name="email"></p>
              <p>Contact First Name: <input type="text" name="contactFName"></p>
              <p>Contact Last Name: <input type="text" name="contactLName"></p>
              <br><br><strong>Quality Score Calculation</strong>
              <p>MOZ Domain Authority: <input type="number" name="mozDA1" min="1" max="100"> (max = 100)</p>
              <p>Number of Sponsors: <input type="number" name="sponsors" min="1" max="25"> (max = 25)</p>
              <p>Fat Quarter Shop: <input type="checkbox" name="fqshop"  value=1></p>
              <p>Green Fairy Shop: <input type="checkbox" name="g1fairy"  value=1></p>
              <p>Missouri Star Shop: <input type="checkbox" name="ms1tar" value=1></p>
              <button type="submit" value="Submit">Submit</button>
              <button type="reset" value="Reset">Reset</button>
            </fieldset>
          </form>


      </div>
   </section>
<?php


include(SHARED_PATH . '/public_footer.php');
?>
