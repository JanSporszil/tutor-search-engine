<?php

class User_info
{
    private string $City;
    private string $Description;

    /**
     * @param string $City
     * @param string $Description
     */
    public function __construct(?string $City, ?string $Description)
    {
        $this->City = $City ?: "";
        $this->Description = $Description ?: "";
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     */
    public function setCity(string $City): void
    {
        $this->City = $City;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }




}