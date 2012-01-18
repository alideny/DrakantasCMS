<div id="body">
		<p>Bienvenido: <b style="text-transform:capitalize;"><?php echo $username; ?></b>.</p>
		<p>E-mail: <b style="text-transform:capitalize;"><?php echo $email; ?></b></p>
		<p>Fecha de Ingreso: <b style="text-transform:capitalize;"><?php echo $joindate; ?></b></p>
		<p>Expansion: <b style="text-transform:capitalize;">
		<?php
		if($expansion == 2){print "Wrath of the Lich King";}
		if($expansion == 1){print "The Burning Crusade";}
		if($expansion == 0){print "Classic";}
		?></b></p>
		<p>Bloqueado: <b style="text-transform:capitalize;"><?php ($locked != 0) ? print "Baneado" : print "No Baneado"; ?></b></p>
		<p>Monedas: <b style="text-transform:capitalize;"><?php echo $coins; ?></b></p>
		<p>Puntos: <b style="text-transform:capitalize;"><?php echo $points; ?></b></p>
	</div>