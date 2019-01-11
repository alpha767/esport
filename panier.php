
<link rel="stylesheet" href="style.panier.css">


<body>
  <div id="w">
    <header id="title">
      <h1>Panier e-sport</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Line Total</th>
            <th class="fifth">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <!-- shopping cart contents -->


        <?php
$DB= new PDO('mysql:host=localhost;dbname=e-sport', 'root2', 'Dta2018!!');
$produit = $DB->prepare("SELECT * FROM produit where id = $_GET[id] ");
if ($produit->execute(array())) {
  while ($row = $produit->fetch()) {?>

          <tr class="productitm">
            <!-- http://www.inkydeals.com/deal/ginormous-bundle/ -->
            <td style="width: 100px; height: 50px;"><img src="<?php echo $row['pathImage']?>" style="border-radius: 5px; margin: 5px 5px;" class="thumb"></td>
            <td><input type="number" value="1" min="0" max="99" class="qtyinput"></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo number_format($row['prix'],2); ?>  $ </td>
            <td><a href="panier.php?del=<?= $produit->id; ?>"</a></td>
          </tr>



          <!-- tax + subtotal -->
          <!--<tr class="extracosts">
            <td class="light">Shipping &amp; Tax</td>
            <td colspan="2" class="light"></td>
            <td><?php echo number_format($row['prix'] * 1.196,2,',',' '); ?> </td>
            <td>&nbsp;</td>
          </tr>-->
          <tr class="totalprice">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="2"><span class="thick"><?php echo number_format($row['prix'],2); ?>  $ </span></td>
          </tr>

          <!-- checkout btn -->
          <tr class="checkoutrow">
            <td colspan="5" class="checkout"><button style="background-color: blue;border-radius: 5px; "><a href="register.php">ACHETER</a></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
   <?php
  }
}
?>
</body>
