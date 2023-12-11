<?php

namespace App\Services;

use App\DTOS\VendaDTO;
use App\Repositories\VendasRepositoryInterface;

class VendasService
{
    private VendasRepositoryInterface $vendasRepository;

    private VendaServiceStrategy $strategy;

    public function __construct(VendasRepositoryInterface $vendasRepository, VendaServiceStrategy $strategy)
    {
        $this->vendasRepository = $vendasRepository;
        $this->strategy = $strategy;
    }


    public function all()
    {
        return $this->vendasRepository->all();
    }

    public function create(VendaDTO $dados)
    {
        if ($this->strategy->validate_create($dados)){
            return $this->vendasRepository->store($dados);
        }

    }

    public function update(VendaDTO $vendaDTO, $id)
    {
        if($this->strategy->validate_update($vendaDTO,$id)){
            return $this->vendasRepository->update($vendaDTO, $id);
        }


    }

    public function find($id)
    {

        return $this->vendasRepository->find($id);
    }

    public function delete($id)
    {
        if($this->strategy->validate_delete($id)){
            return $this->vendasRepository->destroy($id);
        }
    }

    public function get_closer(){
        return $this->vendasRepository->get_closer();
    }

    public function get_sdr(){
        return $this->vendasRepository->get_sdr();
    }

}
