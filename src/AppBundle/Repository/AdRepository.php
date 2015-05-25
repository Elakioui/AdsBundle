<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AdRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdRepository extends EntityRepository
{
        public function findByObjectCategoryCity($adname,$category,$city){

            $rq = $this->createQueryBuilder('a')
                      ->select('a')
                       ->where('a.title like :title')
                       ->join('a.category','cat','WITH','cat.name=:catName')->addSelect('cat')
                       ->join('a.city','c','WITH','c.name=:cityName')->addSelect('c')
                        ->setParameters(array('catName'=>$category,'cityName'=> $city,'title'=>'%'.$adname.'%'))
                       ->getQuery();
            return $rq->getResult();
        }

        public function findByObjectCategory($adname,$category){

            $rq = $this->createQueryBuilder('a')
                ->select('a')
                ->where('a.title like :title')
                ->join('a.category','cat','WITH','cat.name=:catName')->addSelect('cat')
                ->setParameters(array('catName'=>$category,'title'=>'%'.$adname.'%'))
                ->getQuery();
            return $rq->getResult();
        }

    public function findByObjectCity($adname,$city){

        $rq = $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.title like :title')
            ->join('a.city','c','WITH','c.name=:cityName')->addSelect('c')
            ->setParameters(array('cityName'=> $city,'title'=>'%'.$adname.'%'))
            ->getQuery();
        return $rq->getResult();
    }

    public function findByCategoryCity($category,$city){

        $rq = $this->createQueryBuilder('a')
            ->select('a')
            ->join('a.category','cat','WITH','cat.name=:catName')->addSelect('cat')
            ->join('a.city','c','WITH','c.name=:cityName')->addSelect('c')
            ->setParameters(array('catName'=>$category,'cityName'=> $city))
            ->getQuery();
        return $rq->getResult();
    }
    public function findByObject($adname){

        $rq = $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.title like :title')
            ->setParameters(array('title'=>'%'.$adname.'%'))
            ->getQuery();
        return $rq->getResult();
    }

    public function findByCategory($category){

        $rq = $this->createQueryBuilder('a')
            ->select('a')
            ->join('a.category','cat','WITH','cat.name=:catName')->addSelect('cat')
            ->setParameters(array('catName'=>$category))
            ->getQuery();
        return $rq->getResult();
    }

    public function findByCity($city){

        $rq = $this->createQueryBuilder('a')
            ->select('a')
            ->join('a.city','c','WITH','c.name=:cityName')->addSelect('c')
            ->setParameters(array('cityName'=> $city))
            ->getQuery();
        return $rq->getResult();
    }





}
