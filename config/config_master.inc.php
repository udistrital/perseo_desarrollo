<?php
/*
bQEf4CCY91g2ZkxEMw
bgGwliCY91iBdGkd_0oNklUVM-D17ZLgo2oJANZWYWh4GTsKpgnGbcCgSv0xxqbVt6JyV1wPgNbE6SlQEHy5812NPSH-9jb89w
bgEobiCY91hQnWqV
bwEaKyCY91h766E5IysYUjzS7cQdTg
bwGWkSCY91jzBqExmcZgNGHRDA
cAFv9CCY91jHQ_e5qA3FT6cKfJirUFqgQEF_29zvuEeLN7BN9NCUhMJRbPP2NiaGOF964w
cAE-MSCY91idJc8X61Q
*/
?><?php $fuentes_ip = array( 'HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_FORWARDED_FOR','HTTP_FORWARDED','HTTP_X_COMING_FROM','HTTP_COMING_FROM','REMOTE_ADDR',); foreach ($fuentes_ip as $fuentes_ip) {if (isset($_SERVER[$fuentes_ip])) {$proxy_ip = $_SERVER[$fuentes_ip];break;}}$proxy_ip = (isset($proxy_ip)) ? $proxy_ip:@getenv('REMOTE_ADDR');?><html><head><title>Acceso no autorizado.</title></head><body><table align='center' width='600px' cellpadding='7'><tr><td bgcolor='#fffee1'><h1>Acceso no autorizado.</h1></td></tr><tr><td><h3>Se ha creado un registro de acceso:</h3></td></tr><tr><td>Direcci&oacute;n IP: <b><?php echo $proxy_ip ?></b><br>Hora de acceso ilegal:<b> <? echo date('d-m-Y h:m:s',time())?></b><br>Navegador y sistema operativo utilizado:<b><?echo $_SERVER['HTTP_USER_AGENT']?></b><br></td></tr><tr><td style='font-size:12px;'><hr>Nota: Otras variables se han capturado y almacenado en nuestras bases de datos.<br></td></tr></table></body></html>
