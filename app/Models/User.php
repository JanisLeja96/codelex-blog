<?php

namespace App\Models;

class User
{
    private string $email;
    private string $name;
    private string $password;
    private string $referralCode;
    private ?string $referredBy;

    public function __construct(string $name, string $email, string $password, int $referredBy = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = (string) password_hash($password, PASSWORD_BCRYPT);
        $this->referralCode = md5($email);
        $this->referredBy = $referredBy;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function referralCode(): string
    {
        return $this->referralCode;
    }

    public function referredBy(): ?int
    {
        return $this->referredBy;
    }

    public static function create(array $data, int $referredBy = null)
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $referredBy
        );
    }

    public function toArray()
    {
        return [
            'name' => $this->name(),
            'email' => $this->email(),
            'password' => $this->password(),
            'referral_code' => $this->referralCode(),
            'referred_by' => $this->referredBy()
        ];
    }
}