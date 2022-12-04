<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $movie = new Movie();
        $movie->setTitle('Inception');
        $movie->setRelaseYear('2014');
        $movie->setDescription('This is the description of Inception');
        $movie->setImagePath('https://media.timeout.com/images/105574807/750/422/image.jpg');

        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Dune');
        $movie2->setRelaseYear('2021');
        $movie2->setDescription('This is the description of Dune');
        $movie2->setImagePath('https://www.indiewire.com/wp-content/uploads/2021/10/Screen-Shot-2021-10-26-at-5.47.19-PM-e1645632816311.png?resize=1024,581');
       
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
       
        $manager->persist($movie2);

        $manager->flush();

       
    }
}