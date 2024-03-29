<?php

namespace Zevitagem\LaravelSaasTemplateCore\Services;

use Zevitagem\LaravelSaasTemplateCore\Services\AbstractService;
use Zevitagem\LegoAuth\Helpers\Helper;

class AbstractCrudService extends AbstractService
{
    public function getIndexData(array $data = [])
    {
        $rows = $this->getRepository()->getAllBySlug(Helper::getSlug());

        return compact('rows');
    }
    
    public function getByIdAndSlug(int $id, int $slug = 0)
    {
        if (empty($slug)) {
            $slug = Helper::getSlug();
        }

        return $this->getRepository()->getByIdAndSlug($id, $slug);
    }
    
    public function getById(int $id)
    {
        return $this->getRepository()->getById($id);
    }
    
    public function getBySlug(int $slug = 0)
    {
        if (empty($slug)) {
            $slug = Helper::getSlug();
        }

        return $this->getRepository()->getBySlug($slug);
    }
    
    public function getAllActive()
    {
        return $this->getRepository()->getAllActive();
    }
    
    public function getAll()
    {
        return $this->getRepository()->getAll();
    }
    
    public function destroy(int $id)
    {
        $data = compact('id');
        $data['row'] = $this->getRepository()->getById($id);
        
        parent::handle($data, 'destroy');
        parent::validate($data, 'destroy');
        
        $status = $this->getRepository()->delete($data['row']);
        
        return [
            'status' => $status,
            'row' => $data['row']
        ];
    }
}