<?php
namespace models;

use core\Model;
use models\ORM\NestedTree;

/**
 * Class GetTree
 * @package models
 */
class GetTree extends Model
{
    /**
     * SOURCE ext|dql - источник данных.
     * ext - из внешнего расширения
     * dql - запрос на DQL
     */
    const SOURCE = "dql";

    /**
     * @param int|null $nodeId
     *
     * @return string
     */
    public function getData(int $nodeId = null) : string
    {
        switch (self::SOURCE) {
            case "ext":
                $data = $this->getDataFromExtension($nodeId);
                break;
            case "dql":
                $data = $this->getDataFromDQL($nodeId);
                break;
        }

        return json_encode($data);
    }

    /**
     *  Выгрузка данных с помощью расширения Tree-NestedSet
     *
     * @param int|null $nodeId
     *
     * @return array
     */
    public function getDataFromExtension(int $nodeId = null) : array
    {
        $data = [];
        $repo = $this->doctrine->getRepository(NestedTree::class);

        // выгружаем узел, если он не указан то выгружаются корневые узлы
        $nodeId != null ? $node = $repo->findOneById($nodeId) : $node = null;

        //выгружаем детей узла
        $arrayTree = $repo->childrenHierarchy($node, true);

        //если дети есть - заполняем массив с названием ребенка и количеством детей у него
        if (count($arrayTree)>0) {
            foreach ($arrayTree as $key) {
                $nodes  = $repo->findOneById($key['id']);
                $data[] = ["id" => $key['id'], "title" => $key['title'], "childsCount" => $repo->childCount($nodes, true)];
            }
        }
        return $data;
    }

    /**
     * @param int|null $nodeId
     *
     * @return array
     */
    public function getDataFromDQL(int $nodeId = null) : array
    {
        $nodeId != null ? $condition = " = ".$nodeId : $condition = " IS NULL";
        $query = $this->doctrine->createQuery('SELECT n.id, n.title, (Select COUNT(m.id) from \models\ORM\NestedTree as m WHERE m.parent = n.id) as childsCount FROM \models\ORM\NestedTree as n WHERE n.parent'.$condition.' ORDER by n.title ASC');
        $data = $query->getArrayResult();
        return $data;
    }
}
