<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CategoriesRepository;

use Faker\Factory;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Images;


class AppFixtures extends Fixture
{
    public $categories;

    public function __construct(CategoriesRepository $categories)
    {
        $this->categories = $categories;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

       
            $categorie = new Categories;
            $categorie->setNom("Male");
            $manager->persist($categorie);
            $categorie = new Categories;
            $categorie->setNom("Femelle");
            $manager->persist($categorie);
        
         $categories = $this->categories->findAll();

        for ($a=0; $a<10; $a++)
        {
            $image = new Images;
            $image->setUrl($faker->imageUrl($width = 200, $height = 200));
            $image->setAlt($faker->word);
            $manager->persist($image);

            $article = new Articles;
            $article->setNom($faker->name);
            $article->setDate($faker->dateTime($max = 'now', $timezone = 'Europe/Paris'));
            $article->setDescription($faker->text($maxNbChars = 200) );
            $article->setImages($image);

            $article->setCategories($categorie);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
