<?php

class ModelUsers{
    private ?int $id_user;
    private ?string $name_user;
    private ?string $first_name_user;
    private ?string $email_user;
    private ?string $password_user;

    public function __construct(?string $email_user){
    $this->email_user=$email_user;
    }

//START GETTERS
public function getIdUser(): ?int{
    return $this->id_user;
}
public function getNameUser(): ?string{
    return $this->name_user;
}
public function getFirstNameUser(): ?string{
    return $this->first_name_user;
}
public function getEmailUser(): ?string{
    return $this->email_user;
}
public function getPasswordUser(): ?string{
    return $this->password_user;
}
//END GETTERS


//START SETTERS
public function setIdUser(?int $id_user): ModelUsers{
    $this->id_user = $id_user;
    return $this;
}
public function setNameUser(?string $name_user): ModelUsers{
    $this->name_user = $name_user;
    return $this;
}
public function setFirstNameUser(?string $first_name_user): ModelUsers{
    $this->first_name_user = $first_name_user;
    return $this;
}
public function setEmailUser(?string $email_user): ModelUsers{
    $this->email_user = $email_user;
    return $this;
}
public function setPasswordUser(?string $password_user): ModelUsers{
    $this->password_user = $password_user;
    return $this;
}
//END SETTERS
}
