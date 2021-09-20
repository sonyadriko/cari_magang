<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="index.php"><i class="fa fa-tachometer"></i><span>Menu</span></a></li>
		        <li><a href="tambah_lowongan.php"><i class="fa fa-cogs"></i><span>Tambah Lowongan</span></a></li>
		        <li id="menu-comunicacao" ><a href="lihat_lamaran_bos.php"><i class="fa fa-book nav_icon"></i><span>Lihat Daftar Pelamar</a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="../../asset/js/jquery.nicescroll.js"></script>
		<script src="../../asset/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="../../asset/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     