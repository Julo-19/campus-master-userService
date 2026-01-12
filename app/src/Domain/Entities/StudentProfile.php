<?php
namespace App\src\Domain\Entities;

class StudentProfile {
    public function __construct(
        public string $prenom,
        public string $nom,
        public string $ine,
        public ?string $telephone = null,
        public ?string $date_naissance = null
    ) {}
}
