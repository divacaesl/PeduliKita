<?php

namespace App\Repositories\Contracts;

interface CampaignRepositoryInterface
{
    public function getAll();
    public function getActive();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
