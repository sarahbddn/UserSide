<?php
class Utilisateur
{
    public $pseudo;
    public $email;
    public $motdepasse;

   public function __construct($pseudo, $email, $motdepasse)
   {
       $this->pseudo = $pseudo;
       $this->email = $email;
       $this->motdepasse = $motdepasse;
   }
}
?>