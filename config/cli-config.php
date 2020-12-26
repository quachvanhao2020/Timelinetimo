<?php
use Identimo\Orm;
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(Orm::getEntityManager());
