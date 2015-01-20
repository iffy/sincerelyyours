<h3>    <a href="index.php">Initial Page</a> 
    <a href="stories.php">Stories</a> 
    <a href="photo_upload.php">Upload Photo</a> 
    <a href="list_photos.php">See Photos</a>
    <a href="showguests.php">Show Guest</a>
    <a href="logout.php">Logout</a> </h3>
    </div>
    
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Joseph Barlow</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
