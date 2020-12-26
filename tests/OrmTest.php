<?php
declare(strict_types=1);

use Doctrine\Common\Collections\ArrayCollection;
use Timelinetimo\Orm;
use PHPUnit\Framework\TestCase;
use \Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Timelinetimo\Timeline;
use YPHP\Entity;
use YPHP\EntityLife;

final class OrmTest extends TestCase
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var EntityManager
     */
    protected $em;

    protected function setUp(): void
    {
        $em = Orm::getEntityManager();
        $helperSet = \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
        $app = ConsoleRunner::createApplication($helperSet);
        $app->setAutoExit(false);
        $this->em = $em;
        $this->app = $app;
        try {
            $app->run(new StringInput("orm:schema-tool:update --force"));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function tearDown(): void {
        //$this->app->run(new StringInput("orm:schema-tool:drop --full-database --force"));
    }

    public function testEmpty(): void
    {
        $this->assertInstanceOf(EntityManager::class,$this->em);
    }
    
    public function testUser(): void
    {
        $em = $this->em;
        $user = new Timeline();
        $user->setOwned(new EntityLife());
        $user->setObject($user);
        $user->setData([4543,543]);
        $user->setDateCreated(new DateTime());
        $em->persist($user);
        $em->flush();
        $repository = $em->getRepository(Timeline::class);
        $_user = $repository->find($user->getId());
        var_dump($_user);
        $this->assertEquals($user,$_user);
    }

}