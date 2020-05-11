<?php
 
// namespace RacyMind\Library\Routing;
 
/**
 * Klasa zawiera pojedyńczy element do routingu.
 *
 * @package RacyMind\Library\Routing
 * @author Łukasz Socha <kontakt@lukasz-socha.pl>
 * @licence MIT
 * @version 1.0
 */
class Route
{
    /**
     * @var string Ścieżka URL
     */
    protected $path;
    /**
     * @var string Ścieżka do kontrolera
     */
    protected $file;
    /**
     * @var string Nazwa klasy
     */
    protected $class;
    /**
     * @var string Nazwa metody
     */
    protected $method;
    /**
     * @var array Zawiera wartości domyślne dla parametrów
     */
    protected $defaults;
    /**
     * @var array Zawiera reguły przetważania dla parametrów
     */
    protected $params;
 
    /**
     * @param string $path Ścieżka URL
     * @param array $config Tablica ze ścieżką do kontrolera oraz nazwą metody
     * @param array $params Tablica reguł przetważania dla parametrów
     * @param array $defaults Tablica wartości domyślne parametrów
     */
    public function __construct($path, $config, $params = array(), $defaults = array())
    {
        $this->path = $path;
        $this->file = $config['file'];
        $this->method = $config['method'];
        $this->class = $config['class'];
        $this->setParams($params);
        $this->setDefaults($defaults);
    }
 
    /**
     * @param string $controller
     */
    public function setFile($controller)
    {
        $this->file = $controller;
    }
 
    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
 
    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }
 
    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
 
    /**
     * @param array $defaults
     */
    public function setDefaults($defaults)
    {
        $this->defaults = $defaults;
    }
 
    /**
     * @return array
     */
    public function getDefaults()
    {
        return $this->defaults;
    }
 
    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
 
    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
 
    /**
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
 
    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
 
    /**
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = HTTP_SERVER . $path;
    }
 
    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
 
    /**
     * Generuje przyjazny link.
     * @param array $data
     * @return string
     */
    public function generateUrl($data)
    {
        if (is_array($data)) {
            $key_data = array_keys($data);
            foreach ($key_data as $key) {
                $data2['<' . $key . '>'] = $data[$key];
            }
            $url = str_replace(array('?', '(', ')'), array('', '', ''), $this->path);
            return str_replace(array_keys($data2), $data2, $url);
        } else {
            return str_replace(array('?', '(', ')'), array('', '', ''), $this->path);
        }
    }
} 