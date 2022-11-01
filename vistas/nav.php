<div class="navbar-inner">
	<div class="container">
		<a class="brand" href="../index.php">
		<?php session_start();

            echo $_SESSION['user'];?>
	    </a>
	<ul class="nav">
	    <li class="active">
	    	<a href="../includes/logout.php">
	    		<i class="icon-lock icon-white">	   	
	    		</i>
	    	Cerrar sesion	
	        </a>
	    </li>
	    <!--li>
	    	<a href="Matricula.php">
	    		<i class="icon-user icon-white">
	    		</i> 
	    	Matricula
	     	</a>
	    </li-->
	  </ul>    
	</div>	
</div>