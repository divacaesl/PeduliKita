<?php

namespace App\Repositories;

use App\Models\Campaign;
use App\Repositories\Contracts\CampaignRepositoryInterface;

class CampaignRepository implements CampaignRepositoryInterface
{
    protected $model;

    public function __construct(Campaign $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getActive()
    {
        return $this->model->where('is_active', true)->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $campaign = $this->model->find($id);
        if ($campaign) {
            $campaign->update($data);
            return $campaign;
        }
        return null;
    }

    public function delete($id)
    {
        $campaign = $this->model->find($id);
        if ($campaign) {
            return $campaign->delete();
        }
        return false;
    }
}
