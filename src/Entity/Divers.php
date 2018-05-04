<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiversRepository")
 */
class Divers extends Produit
{
	/**
	* @ORM\ManyToOne(targetEntity="TypeDivers")
	* @ORM\JoinColumn(name="id_type_divers", referencedColumnName="id_type_divers", nullable=false)
	*/
    private $TypeDivers;
	
	public function getTypeDivers()
    {
        return $this->TypeDivers;
    }

    public function setTypeDivers(TypeDivers $TypeDivers)
    {
        $this->TypeDivers = $TypeDivers;

        return $this;
    }
}
