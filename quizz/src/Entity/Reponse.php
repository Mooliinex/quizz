<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_question", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idQuestion = NULL;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponse", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $reponse = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="reponse_expected", type="boolean", nullable=true, options={"default"="NULL"})
     */
    private $reponseExpected = 'NULL';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuestion(): ?int
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(?int $idQuestion): self
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(?string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function isReponseExpected(): ?bool
    {
        return $this->reponseExpected;
    }

    public function setReponseExpected(?bool $reponseExpected): self
    {
        $this->reponseExpected = $reponseExpected;

        return $this;
    }


}
