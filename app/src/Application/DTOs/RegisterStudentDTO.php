<?php
namespace App\src\Application\DTOs;

class RegisterStudentDTO
{
    // public string $name;
    public string $email;
    public string $password;

    public string $prenom;
    public string $nom;
    public string $ine;
    public ?string $telephone;
    public ?string $date_naissance;

    public function __construct(array $data)
    {
        // $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->prenom = $data['prenom'];
        $this->nom = $data['nom'];
        $this->ine = $data['ine'];
        $this->telephone = $data['telephone'] ?? null;
        $this->date_naissance = $data['date_naissance'] ?? null;
    }

    public function toArray(): array
    {
        return [
            // 'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'ine' => $this->ine,
            'telephone' => $this->telephone,
            'date_naissance' => $this->date_naissance,
        ];
    }
}
