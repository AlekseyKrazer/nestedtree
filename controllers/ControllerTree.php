<?php
namespace Controllers;

use core\Controller;
use models\GetTree;

/**
 * Class ControllerTree
 * @package Controllers
 */
class ControllerTree extends Controller
{

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function actionIndex()
    {
        $tree = new GetTree();
        $tree->source ="dql";
        $data = $tree->getData(null);
        $twig = $this->view->generateTwig();

        $data = json_decode($data);
        echo $twig->render('tree.html', ['data' => $data]);
    }

    public function actionApi()
    {
        if (isset($_POST['id'])) {
            $id   = intval($_POST['id']);
            $tree = new GetTree();
            $tree->source ="dql";
            $data = $tree->getData($id);
            echo $data;
        }
    }
}