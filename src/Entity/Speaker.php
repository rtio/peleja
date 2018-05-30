<?php
/**
 * Created by PhpStorm.
 * User: rtio
 * Date: 30/05/18
 * Time: 00:01
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Speaker
 * @package App\Entity
 *
 * @ORM\Entity
 */
class Speaker
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
}