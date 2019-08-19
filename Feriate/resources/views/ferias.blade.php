@extends('plantilla')
  <link rel="stylesheet" href="./css/index.css">
@section('titulo')
Ferias por categoria
@endsection
@section('content')
{{--
if ($_GET){

  $categoria = $_GET["categoria"];
  function datos_ferias($categoria){

        global $db;

         $query = $db->prepare("SELECT * FROM feriate_db.ferias
                                INNER JOIN productos ON pr_fe_id = fe_id
                                INNER JOIN categorias
                                WHERE pr_cat_id = cat_id
                                AND cat_nombre = '$categoria'
                                GROUP BY fe_id");
         $query->execute();
         $datos_ferias = $query->fetchAll(PDO::FETCH_ASSOC);
        return $datos_ferias;
}
} --}}

  <div class="container">
    <div class="inicio">
      <h1>Ferias Americanas</h1>
      <h2>Elegi la feria segun su ubicacion o los productos que te gusten</h2>
    </div>
    <?php if(!empty(datos_ferias($categoria))) :?>
    <div class="botones">
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ORDENAR POR
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Ubicacion</a>
          <a class="dropdown-item" href="#">Fecha</a>
        </div>
      </div>
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          FILTRAR POR
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Producto</a>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <hr>
    <?php if(empty(datos_ferias($categoria))) :?>
       <div class="alert alert-danger mx-5" role="alert" >
        <p>Lo Sentimos No Hay Datos para la Categoria seleccionada</p>
       </div>
    <?php endif ;?>
    <main>
    <?php if(!empty(datos_ferias($categoria))) :?>
        <?php foreach (datos_ferias($categoria) as $feria) :?>
        <div class="feria">
          <div class="header-feria">
            <h3><?php echo $feria["fe_nombre"] ?></h3>
            <h5><?php echo $feria["fe_ubicacion"] ?></h5>
            <a target="_blank" href="https://www.google.com/maps/place/<?php echo $feria['fe_ubicacion'] ?>" title="Click para ver en el mapa"><img src="images/mapa.jpeg" alt=""></a>
          <!---  <img src="./img_user/<?php // echo $feria["avatar"] ?>" alt="">  --->
          </div>
          <div class="boton-header">
            <a href="feria.php?id=<?= $feria["fe_id"]?>" ><button class="btn btn-light" type="button" name="button">Ver feria!</button></a>
          </div>
          <div class="descripcion">
            <?php echo $feria["fe_descripcion"] ?>
          </div>
          <div class="cuerpo-feria">
            <?php if(!empty($feria["img_nombre"])) :?>
              <img src="img_user/<?php echo $feria["img_nombre"] ?>" alt="">
              <img src="img_user/<?php echo $feria["img_nombre"] ?>" alt="">
             <?php endif; ?>
            <?php if(empty($feria["img_nombre"])) :?>
               <img src="images/logo_feriate_deffault.png" alt="">
               <img src="images/logo_feriate_deffault_ii.png" alt="">
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach ?>
     <?php endif; ?>
@endsection
