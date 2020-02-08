<?php
$entityManager = \core\DBConnect::getConnection();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
