
    </div>
    
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, My Stories Are</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>
