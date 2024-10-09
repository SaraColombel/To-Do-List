<?php
class ModelTasks
{
    private ?int $id_user;
    private ?int $id_category;
    private ?string $name_task;
    private ?string $content_task;
    private ?string $date_task;

    public function __construct(?string $name_task, ?string $content_task, ?string $date_task)
    {
        $this->nom_task = $name_task;
        $this->content_task = $content_task;
        $this->date_task = $date_task;
    }

    //START GETTERS
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }
    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }
    public function getNameTask(): ?string
    {
        return $this->name_task;
    }
    public function getContentTask(): ?string
    {
        return $this->content_task;
    }
    public function getDateTask(): ?string
    {
        return $this->date_task;
    }
    //END GETTERS


    //START SETTERS
    public function setIdUser(?int $id_user): ModelTasks
    {
        $this->id_user = $id_user;
        return $this;
    }
    public function setIdCategory(?string $id_category): ModelTasks
    {
        $this->id_category = $id_category;
        return $this;
    }
    public function setNameTask(?string $name_task): ModelTasks
    {
        $this->name_task = $name_task;
        return $this;
    }
    public function setContentTask(?string $content_task): ModelTasks
    {
        $this->content_task = $content_task;
        return $this;
    }
    public function setDateTask(?string $date_task): ModelTasks
    {
        $this->date_task = $date_task;
        return $this;
    }
    //END SETTERS
}