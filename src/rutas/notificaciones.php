<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//GET Todas las Notificaciones
$app->get('/api/notificaciones' , function(Request $request , Response $response){

    $sql = "SELECT * FROM notificacion JOIN grupo ON grupo.idGrupo = notificacion.Grupo_idGrupo WHERE notificacion.Grupo_idGrupo = notificacion.Grupo_idGrupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificaciones = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificaciones);
        }else{
            echo json_encode("No existen notificaciones en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Todos las PROGRAMAS
$app->get('/api/programas' , function(Request $request , Response $response){

    $sql = "SELECT * FROM programa";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificaciones = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificaciones);
        }else{
            echo json_encode("No existen notificaciones en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Todos los USUARIOS EN DETERMINADO GRUPO
$app->get('/api/usuarios/grupo/asignado/{id}' , function(Request $request , Response $response){

    $id_grupo = $request->getAttribute('id');
    $sql = "SELECT * FROM usuario JOIN agrupamiento ON agrupamiento.Usuario_idUsuario = usuario.idUsuario WHERE agrupamiento.Grupo_idGrupo = $id_grupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificaciones = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificaciones);
        }else{
            echo json_encode("No existen usuarios en este grupo en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar Notificaciones por ID de Grupo
$app->get('/api/notificaciones/{id}' , function(Request $request , Response $response){

    $id_notificacion = $request->getAttribute('id');
    $sql = "SELECT * FROM notificacion WHERE idNotificacion = $id_notificacion";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificacion = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificacion);
        }else{
            echo json_encode("No existe un cliente con ese id en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar Grupo por ID de Grupo
$app->get('/api/grupo/identifica/conid/{id}' , function(Request $request , Response $response){

    $GrupoidGrupo = $request->getAttribute('id');
    $sql = "SELECT * FROM grupo WHERE idGrupo = $GrupoidGrupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificacion = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificacion);
        }else{
            echo json_encode("No existe ningun Grupo con ese id en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});


//GET Recuperar Agrupamientos por ID de Grupo
$app->get('/api/agrupamientos/{id}' , function(Request $request , Response $response){

    $GrupoidGrupo = $request->getAttribute('id');
    $sql = "SELECT * FROM agrupamiento WHERE Grupo_idGrupo = $GrupoidGrupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificacion = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificacion);
        }else{
            echo json_encode("No existe ninguna agrupacion con ese id en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar Agrupamientos por ID de Usuario
$app->get('/api/usuarioSel/{id}' , function(Request $request , Response $response){

    $Usuarioid = $request->getAttribute('id');
    $sql = "SELECT * FROM usuario WHERE idUsuario = $Usuarioid";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $notificacion = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($notificacion);
        }else{
            echo json_encode("No existe ninguna agrupacion con ese id en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});



//GET Todos los GRUPOS
$app->get('/api/grupos' , function(Request $request , Response $response){

    $sql = "SELECT * FROM grupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $grupos = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($grupos);
        }else{
            echo json_encode("No existen grupos en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar ID de grupo por nombre
$app->get('/api/grupo/{nombre}' , function(Request $request , Response $response){

    $nombre_grupo = $request->getAttribute('nombre');

    $sql = "SELECT * FROM grupo WHERE nombre = '$nombre_grupo'";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $grupo = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($grupo);
        }else{
            echo json_encode("No existe un grupo con ese nombre en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar ID de agrupamiento por nombre
$app->get('/api/agrupamiento/nombre/{id_grupo}/{id_usuario}' , function(Request $request , Response $response){

    $id_grupo = $request->getAttribute('id_grupo');
    $id_usuario = $request->getAttribute('id_usuario');

    $sql = "SELECT * FROM agrupamiento WHERE Grupo_idGrupo = '$id_grupo' AND Usuario_idUsuario = '$id_usuario'";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $grupo = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($grupo);
        }else{
            echo json_encode("No existe un agrupamiento con esos id's en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Recuperar ID de usuario por nombre
$app->get('/api/usuario/{nombre}' , function(Request $request , Response $response){

    $nombrecompleto = $request->getAttribute('nombre');

    $sql = "SELECT * FROM usuario WHERE nombrecompleto = '$nombrecompleto'";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $grupo = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($grupo);
        }else{
            echo json_encode("No existe un usuario con ese nombre en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//GET Todos los USUARIOS
$app->get('/api/usuarios' , function(Request $request , Response $response){

    $sql = "SELECT * FROM usuario";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->query($sql);

        if($resultado->rowCount() > 0){
            $grupos = $resultado->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($grupos);
        }else{
            echo json_encode("No existen usuarios en la base de datos");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});



//POST Crear una nptificacion nuevo
$app->post('/api/notificacion/nueva' , function(Request $request , Response $response){

    $titulo = $request->getParam('titulo');
    $descripcion = $request->getParam('descripcion');
    $Grupo_idGrupo = $request->getParam('Grupo_idGrupo');
    $fecha = $request->getParam('fecha');

    $sql = "INSERT INTO notificacion (titulo , descripcion , fecha , Grupo_idGrupo) VALUES (:titulo , :descripcion , :fecha , :Grupo_idGrupo)";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':titulo' , $titulo);
        $resultado->bindParam(':descripcion' , $descripcion);
        $resultado->bindParam(':fecha' , $fecha);
        $resultado->bindParam(':Grupo_idGrupo' , $Grupo_idGrupo);
    
        $resultado->execute();
        echo json_encode("Nueva Notificacion Guardada Exitosamente");

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//POST Crear un Grupo Nuevo
$app->post('/api/grupo/nuevo' , function(Request $request , Response $response){

    $nombre = $request->getParam('nombre');
    $descripcion = $request->getParam('descripcion');

    $sql = "INSERT INTO grupo (nombre , descripcion) VALUES (:nombre , :descripcion)";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre' , $nombre);
        $resultado->bindParam(':descripcion' , $descripcion);
    
        $resultado->execute();
        echo json_encode("Nuevo Grupo Guardada Exitosamente");

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//POST Crear un Usuario Nuevo
$app->post('/api/usuario/nuevo/2' , function(Request $request , Response $response){

    $nombrecompleto = $request->getParam('nombrecompleto');
    $boleta = $request->getParam('boleta');
    $token = $request->getParam('token');
    $tipo = $request->getParam('tipo');
    $Programa_idPrograma = $request->getParam('Programa_idPrograma');

    $sql = "INSERT INTO usuario (nombrecompleto, boleta, token, tipo, Programa_idPrograma) VALUES (:nombrecompleto , :boleta , :token, :tipo, :Programa_idPrograma)";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombrecompleto' , $nombrecompleto);
        $resultado->bindParam(':boleta' , $boleta);
        $resultado->bindParam(':token' , $token);
        $resultado->bindParam(':tipo' , $tipo);
        $resultado->bindParam(':Programa_idPrograma' , $Programa_idPrograma);
    
        $resultado->execute();
        echo json_encode("Nuevo Grupo Guardada Exitosamente");

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//POST Crear un Agrupamiento Nuevo
$app->post('/api/agrupamiento/nuevo' , function(Request $request , Response $response){

    $Usuario_idUsuario = $request->getParam('Usuario_idUsuario');
    $Grupo_idGrupo = $request->getParam('Grupo_idGrupo');

    $sql = "INSERT INTO agrupamiento (Usuario_idUsuario , Grupo_idGrupo) VALUES (:Usuario_idUsuario , :Grupo_idGrupo)";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':Usuario_idUsuario' , $Usuario_idUsuario);
        $resultado->bindParam(':Grupo_idGrupo' , $Grupo_idGrupo);
    
        $resultado->execute();
        echo json_encode("Nuevo Grupo Guardada Exitosamente");

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//PUT Modificar Grupo
$app->put('/api/grupo/modificar/{id}' , function(Request $request , Response $response){

    $id_grupo = $request->getAttribute('id');
    $nombre = $request->getParam('nombre');
    $descripcion = $request->getParam('descripcion');

    $sql = "UPDATE grupo SET 
    nombre = :nombre,
    descripcion = :descripcion
    WHERE grupo.idGrupo = $id_grupo";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre' , $nombre);
        $resultado->bindParam(':descripcion' , $descripcion);

        $resultado->execute();
        echo json_encode("Grupo Actualizado Exitosamente");

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE usuario por id
$app->delete('/api/usuario/eliminar/{id}' , function(Request $request , Response $response){

    $id_cliente = $request->getAttribute('id');

    $sql = "DELETE FROM usuario WHERE idUsuario = $id_cliente";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Cliente Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Cliente Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE Eliminar GRUPO POR ID
$app->delete('/api/grupos/eliminar/{id}' , function(Request $request , Response $response){

    $id_cliente = $request->getAttribute('id');

    $sql = "DELETE FROM grupo WHERE idGrupo = $id_cliente";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Cliente Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Cliente Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE Eliminar NOTIFICACION por id de grupo
$app->delete('/api/notificacion/eliminar/{id}' , function(Request $request , Response $response){

    $id_grupo_eliminar = $request->getAttribute('id');

    

    $sql = "DELETE FROM notificacion WHERE Grupo_idGrupo = $id_grupo_eliminar";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Grupo Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Grupo Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE Eliminar AGRUPAMIENTO por id de USUARIO
$app->delete('/api/agrupamiento/eliminar/dos/{id}' , function(Request $request , Response $response){

    $id_usuario_eliminar = $request->getAttribute('id');

    $sql = "DELETE FROM agrupamiento WHERE Grupo_idGrupo = $id_usuario_eliminar";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Grupo Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Grupo Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE Eliminar AGRUPAMIENTO por id de USUARIO y id GRUPO
$app->delete('/api/agrupamiento/eliminar/usuario/grupo/{id}/{id2}' , function(Request $request , Response $response){

    $id_usuario_eliminar = $request->getAttribute('id');
    $id_grupo_eliminar = $request->getAttribute('id2');

    $sql = "DELETE FROM agrupamiento WHERE Usuario_idUsuario = $id_usuario_eliminar AND Grupo_idGrupo = $id_grupo_eliminar ";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Grupo Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Grupo Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});

//DELETE Eliminar AGRUPAMIENTO por id de USUARIO
$app->delete('/api/agrupamiento/eliminar/usuario/grupo/{id}' , function(Request $request , Response $response){

    $id_usuario_eliminar = $request->getAttribute('id');

    

    $sql = "DELETE FROM agrupamiento WHERE Usuario_idUsuario = $id_usuario_eliminar";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Grupo Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Grupo Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});


//DELETE Eliminar Grupo
$app->delete('/api/grupo/eliminar/{id}' , function(Request $request , Response $response){

    $id_grupo_eliminar = $request->getAttribute('id');

    

    $sql = "DELETE FROM notificacion
            JOIN grupo 
            WHERE Grupo_idGrupo = $id_grupo_eliminar";

    try{
        $db = new db();
        $db = $db->conectDB();
        $resultado = $db->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0){
            echo json_encode("Grupo Eliminado Exitosamente");
        }else{
            echo json_encode("No Existe Ningun Grupo Con Este Id");
        }

        $resultado = null;
        $db = null;

    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMessage().'}';
    }
});