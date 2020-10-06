<?php

namespace App\Entity;

class Search
{

    /**
    * @var string|null
    */
    private $searchEmail;

    /**
    * @return string|null
    */
    public function getSearchEmail(): ?string
    {
        return $this->searchEmail;
    }

    /**
    * @param string|null $search
    * @return Search
    */
    public function setSearchEmail(string $search): Search
    {
        $this->searchEmail = $search;
        return $this;
    }

}
