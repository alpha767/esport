
<?php
$DB= new PDO('mysql:host=localhost;dbname=e-sport', 'root2', 'Dta2018!!');
$produit = $DB->prepare("SELECT * FROM produit where id = $_GET[id] ");
if ($produit->execute(array())) {
  while ($row = $produit->fetch()) {?>

  <div class="card" style="background-color: blue; width: 500px; margin-left: 300px; border-radius: 5px; height: 500">

    <h1 style="
          font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
          color: #fff;
          text-shadow: 1px 2px 0 #7184d8;
          font-size: 3.5em;
          line-height: 1.1em;
          padding: 6px 0;
          font-weight: normal;
          text-align: center;"> Ficher-produit

    </h1>

    <div class="game-pic">
      <img src="<?php echo $row['pathImage']?>" style="border-radius: 5px; margin: 20px 5px; margin-left: 30%;">



      <div class="card-body" style="margin-left: 30%; font-size: 20px;">
      <p class="card-title"><?php echo $row['nom']; ?></p>
      <p class="card-text"><span style="color: red"><?php echo number_format($row['prix'],2); ?> $ <?php echo $row['couleur']; ?></p>
    </div>
    <div class="card-footer" style="margin-left: 30%; color: White;" font-size: 20px;>
      <small class="text-muted" style="margin: 40px 0px;">Tailles : S, M, L, XL, 2 XL</small>
    </div>
    </div>
  </div>


   <?php
  }
}
?>
