<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200208111446 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $nested_tree = array(
            array('id' => '1','tree_root' => '1','parent_id' => NULL,'title' => 'Продукты','lft' => '1','lvl' => '0','rgt' => '12'),
            array('id' => '2','tree_root' => '1','parent_id' => '1','title' => 'Фрукты','lft' => '2','lvl' => '1','rgt' => '3'),
            array('id' => '3','tree_root' => '1','parent_id' => '1','title' => 'Овощи','lft' => '4','lvl' => '1','rgt' => '11'),
            array('id' => '4','tree_root' => '1','parent_id' => '3','title' => 'Огурцы','lft' => '5','lvl' => '2','rgt' => '6'),
            array('id' => '5','tree_root' => '1','parent_id' => '3','title' => 'Картофель','lft' => '7','lvl' => '2','rgt' => '8'),
            array('id' => '6','tree_root' => '1','parent_id' => '3','title' => 'Морковка','lft' => '9','lvl' => '2','rgt' => '10'),
            array('id' => '7','tree_root' => '7','parent_id' => NULL,'title' => 'Автомобили','lft' => '1','lvl' => '0','rgt' => '30'),
            array('id' => '8','tree_root' => '7','parent_id' => '7','title' => 'Toyota','lft' => '2','lvl' => '1','rgt' => '19'),
            array('id' => '9','tree_root' => '7','parent_id' => '8','title' => 'Corolla','lft' => '3','lvl' => '2','rgt' => '14'),
            array('id' => '10','tree_root' => '7','parent_id' => '9','title' => 'Универсал','lft' => '4','lvl' => '3','rgt' => '5'),
            array('id' => '11','tree_root' => '7','parent_id' => '9','title' => 'Седан','lft' => '6','lvl' => '3','rgt' => '11'),
            array('id' => '12','tree_root' => '7','parent_id' => '11','title' => 'Черная','lft' => '7','lvl' => '4','rgt' => '8'),
            array('id' => '13','tree_root' => '7','parent_id' => '11','title' => 'Белая','lft' => '9','lvl' => '4','rgt' => '10'),
            array('id' => '14','tree_root' => '7','parent_id' => '9','title' => 'Хэчбэк','lft' => '12','lvl' => '3','rgt' => '13'),
            array('id' => '15','tree_root' => '7','parent_id' => '8','title' => 'Land Cruiser 200','lft' => '15','lvl' => '2','rgt' => '16'),
            array('id' => '16','tree_root' => '7','parent_id' => '8','title' => 'Tundra','lft' => '17','lvl' => '2','rgt' => '18'),
            array('id' => '17','tree_root' => '7','parent_id' => '7','title' => 'Nissan','lft' => '20','lvl' => '1','rgt' => '21'),
            array('id' => '18','tree_root' => '7','parent_id' => '7','title' => 'Лада','lft' => '22','lvl' => '1','rgt' => '23'),
            array('id' => '19','tree_root' => '7','parent_id' => '7','title' => 'УАЗ','lft' => '24','lvl' => '1','rgt' => '29'),
            array('id' => '20','tree_root' => '7','parent_id' => '19','title' => 'Буханка','lft' => '25','lvl' => '2','rgt' => '26'),
            array('id' => '21','tree_root' => '7','parent_id' => '19','title' => 'Бобик','lft' => '27','lvl' => '2','rgt' => '28')
        );

        foreach ($nested_tree as $key) {
            $this->addSql(
                'INSERT INTO nested_tree (id, tree_root, parent_id, title, lft, lvl, rgt) 
                      VALUES (:id, :tree_root, :parent_id, :title, :lft, :lvl, :rgt)',
                $key
            );
        }
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM nested_tree WHERE id<=21');
    }
}
