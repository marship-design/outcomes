<?php
 
// namespace RacyMind\Library\Routing;
 
/**
 * Klasa zawiera kolekcję elementów klasy Route.
 * @package RacyMind\Library\Routing
 * @author Łukasz Socha <kontakt@lukasz-socha.pl>
 * @licence MIT
 * @version 1.0
 */
class RouteColletion
{
    /**
     * @var array Tablica obiektów klasy Route
     */
    protected $items;
 
    /**
     * Dodaje obiekt Route do kolekcji
     * @param string $name Nazwa elementu
     * @param Route $item Obiekt Route
     */
    public function add($name, $item)
    {
        $this->items[$name] = $item;
    }
 
    /**
     * Zwraca obiekt Route
     * @param string $name Nazwa obiektu w kolekcji
     * @return Route|null
     */
    public function get($name)
    {
        if (array_key_exists($name, $this->items)) {
            return $this->items[$name];
        } else {
            return null;
        }
    }
 
    /**
     * Zwraca wszystkie obiekty kolekcji
     * @return array array
     */
    public function getAll()
    {
        return $this->items;
    }
}