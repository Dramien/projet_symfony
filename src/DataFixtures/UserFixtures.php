<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
  private $nbUsers = 30;
  private $nbBiens = 50;
  private $encoder;


  /**
   * Class Constructor
   * @param    $passwordEncoder
   */
  public function __construct(UserPasswordEncoderInterface $passwordEncoder)
  {
    $this->encoder = $passwordEncoder;
  }

  public function load(ObjectManager $manager)
  {

    $faker = Faker\Factory::create('fr_FR'); // create a French faker

    // création d'un compte admin pour test
    $admin = new User();
    $admin
      -> setUsername('ADMIN')
      -> setTitre('Mr')
      -> setPrenom('prenom admin')
      -> setNom('nom admin')
      -> setAdresse('Elysée')
      -> setVille('Paris')
      -> setCodePostal('75000')
      -> setTelephone('9999999999')
      -> setEmail('admin@admin.fr')
      -> setPassword($this->encoder->encodePassword($admin, 'admin0'))
      -> setRoles(array('ROLE_ADMIN'));
    $manager->persist($admin);

    // création d'un compte user pour test
    $user = new User();
    $user
      -> setUsername('Testeur')
      -> setTitre('Mr')
      -> setPrenom('Aurélien')
      -> setNom('BRIARD')
      -> setAdresse('14 rue')
      -> setVille('Dijon')
      -> setCodePostal('21000')
      -> setTelephone('0325654785')
      -> setEmail('user@user.fr')
      -> setPassword($this->encoder->encodePassword($user, '000000'));
    $manager->persist($user);

    // création d'utilisateurs
    for ($i=1; $i <= $this->nbUsers ; $i++) { //début de boucle
      $user = new User(); // je crée un user
      $user
        -> setUsername($faker -> userName())
        -> setTitre( $faker -> title($gender = 'male'|'female') )
        -> setPrenom( $faker -> firstName() )
        -> setNom( $faker -> lastName() )
        -> setAdresse( $faker -> streetAddress() )
        -> setVille( $faker -> city() )
        -> setCodePostal( $faker -> numberBetween($min = 00000, $max = 99999) )
        -> setTelephone( $faker -> phoneNumber(10) )
        ->setEmail( $faker -> email() ) // je set l'email avec un mail aléatoire généré par le faker
        ->setPassword( $faker -> password() ); // je set le pass avec un pass aléatoire généré par le faker
      $manager->persist($user);
      $users[]=$user; // je place les users crées dans un tableau
    }

    $manager->flush();

  }
}
