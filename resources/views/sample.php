<h1>Welcome TO Sample page</h1>
<h2>This is Day 1</h2>


<?php if(isset($user)):?>
     <h4>
       Username =  <?php echo $user;?>
     </h4>


<?php endif;?>


<?php if(isset($username)):?>
  <h3>
    User = <?php echo $username;?>


</h3>
<h3>
    Password = <?php echo $pass;?>


</h3>


<?php endif;?>


<!-- display data coming through the redirect() -->
<?php if(session('status')):?>


   <h3><?php echo session('status');?></h3>


<?php endif;?>
