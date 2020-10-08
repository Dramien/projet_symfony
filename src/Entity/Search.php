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

    /**
    * @var string|null
    */
    private $searchTitre;

    /**
    * @var string|null
    */
    private $searchCategorie;

    /**
    * @var int|null
    */
    private $searchPrix;

    /**
    * @return string|null
    */
    public function getSearchTitre(): ?string
    {
        return $this->searchTitre;
    }

    /**
    * @return string|null
    */
    public function getSearchCategorie(): ?string
    {
        return $this->searchCategorie;
    }

    /**
    * @return int|null
    */
    public function getSearchPrix(): ?int
    {
        return $this->searchPrix;
    }

    /**
    * @param string|null $search
    * @return Search
    */
    public function setSearchTitre(string $search): Search
    {
        $this->searchTitre = $search;
        return $this;
    }

    /**
    * @param string|null $search
    * @return Search
    */
    public function setSearchCategorie(string $search): Search
    {
        $this->searchCategorie = $search;
        return $this;
    }

    /**
    * @param int|null $search
    * @return Search
    */
    public function setSearchPrix(int $search): Search
    {
        $this->searchPrix = $search;
        return $this;
    }

}
