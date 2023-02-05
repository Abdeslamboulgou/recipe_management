
<?php
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'abdeslam.boulgou@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'baslam.blg@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'asso.balgo@exemple.com',
        'is_enabled' => false,
    ],
];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
        <style>
.error {color: #FF0000;}
</style>
    </head>
    <body>
    <a href="correcterrors.php?subject=PHP&web=W3schools.com">Test $GET</a>
        
            <?php
// Une bien meilleure façon de stocker une recette !
echo(count($recipes)."<br>");

foreach($recipes as $recipe){
    if (array_key_exists('is_enabled', $recipe) && $recipe['is_enabled'] == true){
        echo(strlen($recipe["title"])."  ");
        echo($recipe['title']." = ".str_replace('C','c',$recipe['title'])."<br>".$recipe['recipe']."<br>".$recipe['author']."<br>");
    }
}

?>
<!--la gestion des formulaires en utilisant POST-->
<form action="correcterrors.php" method="post">
Name: <input type="text" name="namea"><br>
E-mail: <input type="text" name="emaila"><br>
<input type="submit">
</form>

<!--la gestion des formulaires en utilisant GET-->

<form action="correcterrors.php" method="get">
Name: <input type="text" name="namez"><br>
E-mail: <input type="text" name="emailz"><br>
<input type="submit">
</form>
<!-- Validation de formulaire PHP -->
<?php echo "**************************************************************<br>la validation des formulaires PHP, pour protéger votre formulaire contre les pirates et les spammeurs <br>";

// Les champs PHP requises

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        $nameErr = "Only lettres and white space allowed";
      }
    }
    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST["email"]);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format";
        }
    }
    if(empty($_POST["website"])){
         $websiteErr = "website is required";
    } else {
        $website = test_input($_POST["website"]);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
            $websiteErr = "Invalid URL";
        }
    }
    if (empty($_POST["comment"])) {
        $comment = "";
      } else {
        $comment = test_input($_POST["comment"]);
      }
      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<p>Conserver les valeurs des champs dans le formulaire par l'ajout d'attribut value dans les balises HTML : </p>

Name: <input type="text" name="name" value=<?php echo $name?>>
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value=<?php echo $email?>>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value=<?php echo $website?>>
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
<?php // include 'correcterrors.php';?>
<?php
echo readfile("dictionnary.txt");
?>
<p>Ouvrire et lire le fichier</p>
<?php
$myfile = fopen("dictionnary.txt", "r") or die("Unable to open file!");
while(!feof($myfile)){
   echo fgets($myfile)."<br>";
}
fclose($myfile);
?>
<p>Création et ecriture dans fichier</p>
<?php 
 $myfile = fopen("testfile.txt", "w") or die("Unable to open file!");
 $myJob = "Développeur web chez FDI\n";
 fwrite($myfile,$myJob);
 $myName="ABdeslam BOULGOU\n";
 fwrite($myfile,$myName);
 fclose($myfile);
?>
<p>l'ajout des texte dans un fichier existe</p>
<?php 
 $myfile = fopen("testfile.txt", "a") or die("Unable to open file!");
 $myJob = "Développeur full stack chez IRIS IT\n";
 fwrite($myfile,$myJob);
 $myName="BOULGOU Asso";
 fwrite($myfile,$myName);
 fclose($myfile);
?>
<p>Télecharger des fichiers</p>
<form action="correcterrors.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<p>Encoder un tableau associatif et indexer en format JSON</p>
<?php
$age = array("Abdeslam"=>26, "Akram"=>22, "Rami"=>1); 
echo "Tableau associatif encoder : ".json_encode($age)."<br>";// {"Abdeslam":26,"Akram":22,"Rami":1}
$age = array("Abdeslam", "Akram", "Rami"); 
echo "Tableau indexer encoder : ".json_encode($age);// {"Abdeslam","Akram","Rami"}
?>
<p>Decoder les données JSON dans un objet PHP</p>
<?php
  $age ='{"Abdeslam":26,"Akram":22,"Rami":1}';
  $decoderTable = json_decode($age);
  echo "Objet JSON decoder : ".var_dump($decoderTable)."<br>";
  foreach($decoderTable as $keyTable => $valueTable){
    echo $keyTable." en age de : ".$valueTable."<br>";
  }
?>
    </body>
</html>