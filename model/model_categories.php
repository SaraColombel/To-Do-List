<?php
class ModelCategories
{
    private ?string $name_category;

    public function __construct($name_category)
    {
        $this->name_category = $name_category;
    }

    public function getNameCategory(): string|null
    {
        return $this->name_category;
    }
    public function setNameCategory(?string $name_category)
    {
        $this->name_category = $name_category;
        return $this;
    }
}