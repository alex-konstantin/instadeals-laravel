<?php

namespace App\Models\Users\Entities;

use App\Contracts\DoctrineModel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

use LaravelDoctrine\ORM\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends DoctrineModel implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    protected $email;

    protected $hidden = ['password'];

    /**
     * @return mixed
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername(){
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function setUsername($username){
        $this->username = $username;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function setEmail($email){
        $this->email = $email;
        return $this;

    }
}
