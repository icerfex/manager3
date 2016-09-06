<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<style>
			p {
		    	padding:10px;
			}
		</style>
	</head>
	<body>
		<p>
			Para iniciar el proceso de reestablecimiento de contraseña de tu cuenta de NextManager, haz clic en el siguiente enlace:
		</p>
		<p>
			<a href="{{ url('/password/reset/'.$token) }}" >{{ url('/password/reset/'.$token) }}</a>
		</p>
		<p>
			Si eso no funciona, copia la URL y pégala en una ventana nueva del navegador.
		</p>
		<p>
			Si has recibido este mensaje por error, es probable que otro usuario haya introducido sin darse cuenta tu dirección de correo electrónico al intentar restablecer una contraseña. Si no has iniciado el proceso de solicitud, no es necesario que hagas nada al respecto y puedes ignorar este mensaje tranquilamente.
		</p>
	</body>
</html>


