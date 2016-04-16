<?php

namespace Aved\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
	public function findAllOrdered()
	{
		return $this->findBy(array(), array('date' => 'DESC')); 
	}
	public function findAllFromEvent($id)
	{
		return $this->findBy(array('event' => $id), array('date' => 'DESC')); 
	}
}