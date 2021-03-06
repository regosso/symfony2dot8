<?php

namespace CoursesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
	public function getWithCoursos()
  {
    $query = $this->getEntityManager()->createQuery(
      'SELECT c FROM CoursesBundle:Category c LEFT JOIN c.courses j WHERE j.expires_at > :date'
    )->setParameter('date', date('Y-m-d H:i:s', time()));
 
    return $query->getResult();
  }
}
