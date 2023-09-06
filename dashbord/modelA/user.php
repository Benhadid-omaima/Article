<?php
    class User{
        private ?int $id = null;
        private ?string $username = null;
        private ?string $email = null;
        private ?string $password = null;

        public function __construct(string $username, string $email, string $password)
        {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function getUsername(): string
        {
            return $this->username;
        }

        public function setUsername(string $username): void
        {
            $this->username = $username;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        public function getPassword(): string
        {
            return $this->password;
        }


        public function setPassword(string $password): void
        {
            $this->password = $password;
        }


    }
?>