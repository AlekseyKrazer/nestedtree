<?php
namespace core;

/**
 * Class View
 */
class View
{
    /**
     * @return \Twig\Environment
     */
    public function generateTwig()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader, ['debug' => false]);

        return $twig;
    }

    /**
     * @param $content
     * @param null $data
     */
    public function generate($content, $data = null)
    {
        include 'views/'.$content;
    }
}
