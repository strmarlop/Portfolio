<?php

namespace App\DataFixtures;

use App\Entity\Project;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture
{

    public const PROJECTS = [
        ['title' => 'Fake Resume', 'description' => 'Creation of a fictitious character\'s resume, showing professional experience, education, skills and hobbies.', 'picture' => 'p1.jpg', 'url' => 'https://strmarlop.github.io/Projet-1-CV-Fictif/','technology' => 'HTML - CSS - Git - Github - Figma', 'timeSpent' => '2 weeks'],
        ['title' => 'e-stoire', 'description' => 'Creation of a storytelling website where you can create new stories, collaborate on those that are not finished or simply read the stories of other users.', 'picture' => 'p2.jpg', 'url' => 'http://bitly.ws/PH9U', 'technology' => 'HTML - CSS - JavaScript - PHP - SQL - Twig - Git - Github - Figma', 'timeSpent' => '5 weeks'],
        ['title' => 'Emmaüs Mobile Connect', 'description' => 'Our mission was to develop a smartphone classification tool capable of generating accurate selling prices based on key features such as RAM, storage, and more...', 'picture' => 'h2.jpg', 'url' => 'http://bitly.ws/PHaf', 'technology' => 'HTML - SCSS - PHP - Symfony - SQL - Twig - Composer - Yarn  - Git - Github - Figma - Symfony UX', 'timeSpent' => '2 days'],
        ['title' => 'Externatic', 'description' => 'Externatic, a company specializing in the recruitment of IT profiles, needed a hiring site. We decided to allow candidates to apply for jobs with a single click, and companies to update applications.', 'picture' => 'p3.jpg', 'url' => 'http://bitly.ws/PHaG', 'technology' => 'HTML - SCSS - PHP - Symfony - SQL - Twig - Composer - Yarn  - Git - Github - Figma - Symfony UX', 'timeSpent' => '2 months'],
    ];

    public function load(ObjectManager $manager): void
    {
        $createdAt  = new DateTimeImmutable(); 

        foreach (self::PROJECTS as $key => $projectInfo) {
            $project = new Project();
            $project->setTitle($projectInfo['title']);
            $project->setDescription($projectInfo['description']);
            $project->setPicture($projectInfo['picture']);
            $project->setTechnology($projectInfo['technology']);
            $project->setTimeSpent($projectInfo['timeSpent']);
            $project->setUrl($projectInfo['url']);
            $project->setCreatedAt($createdAt);

            $manager->persist($project);

        }

        $manager->flush();
    }
}
