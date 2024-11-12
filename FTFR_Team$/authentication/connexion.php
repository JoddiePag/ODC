<?php
$con=
?>
  $bdd = new PDO('mysql:host=localhost;dbname=odc', 'root', '');
                                        }
                                 //insertion
                                 catch(Exception $e){
                                        
                                        die('Erreur:'.$e->getMessage());
                                 }
                                                $inserer= $bdd->prepare('INSERT INTO odc-edt(nom,mdp,confirmermp) VALUES(?,?,?)');
                                        
                                        if (!empty($_POST['nom'])){
                                        $inserer->execute(array($_POST['nom'],$_POST['mdp'],$_POST['confirmermp']));
                                        echo('bien');
                                }
                                echo('erreur');