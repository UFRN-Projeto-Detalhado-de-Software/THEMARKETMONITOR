<?php

namespace App\DTOS;

class ClienteDTO
{
    use ArrayableDTO;

    public function __construct(
        public ? int $id,
        public ? string $nome_completo,
        public ? string $data_de_nascimento,
        public ? string $email,
        public ? string $cpf,
        public ? string $endereco,
        public ? string $numero,
        public ? string $bairro,
        public ? string $complemento,
        public ? string $cidade,
        public ? string $estado,
        public ? string $cep,
        public ? string $telefone,
        public ? string $genero,
        public ? string $area_de_formacao,
    )
    {}
}
