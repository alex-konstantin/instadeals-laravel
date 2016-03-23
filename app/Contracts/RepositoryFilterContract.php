<?php

namespace App\Contracts;

abstract class RepositoryFilterContract {

    protected $_order = [];

    protected $_perPage = 50;

    protected $_params = [];

    abstract public function getOrderBy();

    abstract public function getPerPage();

    abstract public function getFilterBy();

    public function setOrderBy($orderBy)
    {
        $this->_order = $orderBy;
        return $this;
    }

    public function setPerPage($perPage)
    {
        $this->_perPage = $perPage;
        return $this;
    }

    public function setFilterBy($params)
    {
        $this->_params = $params;
        return $this;
    }

}