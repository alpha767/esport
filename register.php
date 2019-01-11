<?php
require "db.php";

$data = $_POST;
if( isset($data['do_signup']) )
{
    //ici on register
    $errors = array();
    if ( trim($data['nom']) == '' )
{
$errors[] = ' ENTREZ VOTRE NOM';
}
    if ( trim($data['prenom']) == '' )
{
$errors[] = ' ENTREZ VOTRE PRENOM';
}
    if ( trim($data['login']) == '' )
{
    $errors[] = 'ENTREZ VOTRE LOGIN';
}

    if ( trim($data['email']) == '' )
{
    $errors[] = ' ENTREZ VOTRE EMAIL';
}
    if ( trim($data['birthDate']) == '' )
{
$errors[] = ' ENTREZ VOTRE DATE DE NAISSANSE';
}
    if ( trim($data['phone']) == '' )
{
    $errors[] = ' ENTREZ VOTRE NUMERO DE TEL';
}

    if( $data['password'] == '' )
{
    $errors[] = 'ENTREZ VOTRE MOT DE PASSE';
}

    if ( $data['password_2'] != $data['password'])
{
    $errors[] = 'VOTRE 2EME MOT DE PASSE EST PAS CORRECT ';
}

//verification

if( R::count('user', "login = ?", array($data['login'])) > 0 )
{
    $errors[] = 'IL EXISTE DEJA CE LOGIN';
}
if( R::count('user', "email = ?", array($data['email'])) > 0 )
{
    $errors[] = 'IL EXIST DEJA CE EMAIL';
}


if(empty($errors) )
{
    //si tout va bien on peut s'incsrire//
    $user = R::dispense('user');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->Nom = $data['nom'];
    $user->Prenom = $data['prenom'];
    $user->date = $data['birthDate'];
    $user->phone = $data['phone'];
    $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
    R::store($user);
    echo '<div style="color:green;font-weight:bold">Succses vous pouvez <form style="display: inline-block;" action="http://localhost/Projet%20Back-End%20(copie)/index.php">
   <input type="submit" value="E-SPORT">
    </form></div><hr>';
} else
{
    echo '<div style="color:red;font-weight:bold">'.array_shift($errors).'</div><hr>';
}

}



 ?>


 <link rel="stylesheet" href="style-incsrp.css">

<div class="login">

<h1>S'incsrire to E-sport</h1>



<form action="register.php" method="POST" style="text-align: center;">
  <p>
    <label class="lb" for="YourName"><strong>Votre Nom:</strong></label>
  <input type="text" name="nom" value="<?php echo @$data['nom'];?>">
</p>

<p>
  <p><strong>Votre Prenom</strong>:</p>
  <input type="text" name="prenom" value="<?php echo @$data['prenom'];?>">
</p>
  <p>
      <label class="lb" for="YourLogin"><strong>Votre login:</strong></label>
    <input type="text" name="login" value="<?php echo @$data['login'];?>">
</p>

<p>
    <p><strong>Votre Email</strong>:</p>
    <input type="email" name="email" value="<?php echo @$data['email'];?>">
</p>

<p>
    <label class="lb" for="YourLogin"><strong>Votre Date de naissanse:</strong></label>
  <input type="date" name="birthDate" value="<?php echo @$data['birthDate'];?>" style="width: 280px; height: 35px;">
</p>

<p>
  <p><strong>Votre Numero Tel</strong>:</p>
  <input type="tel" name="phone" value="<?php echo @$data['phone'];?>" style="width: 280px; height: 35px;">
</p>



<p>
    <p><strong>Votre password</strong>:</p>
    <input type="password" name="password" value="<?php echo @$data['password'];?>">
</p>

<p>
    <p><strong>Votre password encore une fois</strong>:</p>
    <input type="password" name="password_2" value="<?php echo @$data['password_2'];?>">
</p>




    <input style="width: 95px"  type="submit" value="S'INSCRIRE" name="do_signup">


</form>


<form action="login.php" method="post" style="text-align: center;">
        <input  type="submit" value="SE CONNECTER">
      <from>

</div>
