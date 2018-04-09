<?php

interface JournalDataInterface
{
    public function insertNewRow(DateTime $dateTime);

    public function getSearchResults(string $queryString);
}

class JournalLayer implements JournalDataInterface
{
    /**
     * @param DateTime $dateTime
     */
    public function insertNewRow(DateTime $dateTime)
    {
        return;
    }

    /**
     * @param string $queryString
     * @return array
     */
    public function getSearchResults(string $queryString)
    {
        return array();
    }
}

class JournalProxy implements JournalDataInterface
{
    /** @var JournalLayer */
    protected $_journalLayer;

    /** @var string */
    protected $_password;

    /**
     * @param string $suppliedPassword
     * @return bool
     */
    public function authenticate(string $suppliedPassword)
    {
        if (empty($suppliedPassword) ||
            $suppliedPassword != $this->_password)
        {
            return false;
        }

        $this->_journalLayer = new JournalLayer();
        return true;
    }

    /**
     * @param DateTime $dateTime
     */
    public function insertNewRow(DateTime $dateTime)
    {
        if (is_null($this->_journalLayer))
        {
            return;
        }

        $this->_journalLayer->insertNewRow($dateTime);
    }

    /**
     * @param string $queryString
     * @return array|null
     */
    public function getSearchResults(string $queryString)
    {
        if ($this->_journalLayer == null)
        {
            return null;
        }
        return $this->_journalLayer->getSearchResults($queryString);
    }
}