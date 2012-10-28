<?php

namespace Bricks\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BrickRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BrickRepository extends EntityRepository
{
    public function search($q)
    {
        $em = $this->getEntityManager();
         
        $qb = $em->createQueryBuilder()
            ->select('e')
            ->from('BricksSiteBundle:Brick', 'e')
        ;
        
        // set 'q' doctrine parameter
        $qb->setParameter('q', '%'.$q.'%');
        
        /**
         * searche in 'title' field
         */
        $qb->andWhere($qb->expr()->like('e.title', ':q'));
        
        return $qb->getQuery()->getResult();
    }
}