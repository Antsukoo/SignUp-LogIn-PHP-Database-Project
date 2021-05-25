<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Info Page</title>
    <link rel="stylesheet" href="css/infoPage.css">
  </head>
  <body>

    <!--
      Gets the header from the header.php file
    -->
    <?php
      require_once 'header.php';
     ?>

     <!--
      The main elements on the info page
     -->
     <main>
       <div class="main-div">
         <div class="infoDiv1">
           <div class="main-title">
             <h6>Hover for information about this project!</h6>
             <h1>A little bit about me</h1>
           </div>
           <div class="main-text">
             <p>I'm a 16 year old male from Finland. I'm currently studying programming and web development at the vocational school of Kerava called Keuda.</p><br>
             <p>My favourite hobbies are freediving and gaming. I also love dogs and every other animal in fact, but dogs are my favourite.</p>
           </div>
         </div>
         <div class="infoDiv2">
           <div class="main-title">
             <h1>A little bit about this project</h1>
           </div>
           <div class="main-text">
             <p>So the main subject of this project is the sign up/sign in system you see in the top right corner of this page.</p><br>
             <p>It is meant for one of my classes in school. If you sign up and then log in you can get to your profile page where you can see basic information about yourself.</p>
           </div>
         </div>
       </div>

     </main>

     <!--
       Gets the footer from the footer.php file
     -->
     <?php
       require_once 'footer.php';
      ?>
  </body>
</html>
