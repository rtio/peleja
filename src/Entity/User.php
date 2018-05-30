<?php
/**
 * Created by PhpStorm.
 * User: rtio
 * Date: 29/05/18
 * Time: 23:59
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 *
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
}