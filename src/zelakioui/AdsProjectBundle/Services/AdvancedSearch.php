<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21/05/15
 * Time: 19:20
 */

namespace zelakioui\AdsProjectBundle\Services;
use Symfony\Component\DependencyInjection\ContainerInterface;


class AdvancedSearch {

    private $repository ;

    /**
     * @param ContainerInterface $container
     */

    public function __construct( ContainerInterface $container){
        $this->container = $container;
    }

    /**
     * for advanced search
     * @param $which_object
     * @param $which_category
     * @param $which_city
     * @return mixed
     */
    public function search($which_object, $which_category,$which_city ){

        $this->repository = $this->container->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:Ad');
        if(!empty($which_object) && strval($which_category) != 'category' && strval($which_city)!= 'city'){

           return  $this->byObjectCategoryCity($which_object,$which_category,$which_city);
        }
        else if(!empty($which_object) && strval($which_category) != 'category'){
             return $this->byObjectCategory($which_object,$which_category);

        }
        else  if(!empty($which_object) && strval($which_city) != 'city' ){
             return  $this->byObjectCity($which_object,$which_city );
        }
        else if(strval($which_category) != 'category' && strval($which_city) != 'city'){
            return $this->byCategoryCity($which_category,$which_city);
        }
        elseif (!empty($which_object)){

            return $this->byObject($which_object);

        }
        elseif ( strval($which_category) != 'category'){
            return $this->byCategory($which_category);
        }
        elseif (strval($which_city) != 'city'){
            return $this->byCity($which_city);
        }
    }

    /**
     * @param $which_object
     * @param $which_category
     * @param $which_city
     * @return mixed
     */

    public function byObjectCategoryCity($which_object,$which_category,$which_city){
       return  $this->repository->findByObjectCategoryCity($which_object,$which_category,$which_city);

    }

    /**
     * @param $which_object
     * @param $which_category
     * @return mixed
     */
    public function byObjectCategory($which_object,$which_category){
        return  $this->repository->findByObjectCategory($which_object,$which_category);

    }

    /**
     * @param $which_object
     * @param $which_city
     * @return mixed
     */
    public function byObjectCity($which_object, $which_city){
        return  $this->repository->findByObjectCity($which_object,$which_city);

    }

    /**
     * @param $which_category
     * @param $which_city
     */
    public function byCategoryCity($which_category,$which_city){
        return  $this->repository->findByCategoryCity($which_category,$which_city);

    }

    /**
     * @param $which_object
     * @return string
     */
    public function byObject($which_object){
        return  $this->repository->findByObject($which_object);

    }

    /**
     * @param $which_category
     * @return mixed
     */

    public function byCategory($which_category){
        return  $this->repository->findByCategory($which_category);

    }

    /**
     * @param $which_city
     * @return mixed
     */
    public function byCity($which_city){
        return  $this->repository->findByCity($which_city);

    }

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param mixed $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }


}