<?php

namespace Zevitagem\LaravelSaasTemplateCore\Services\Config;

use Zevitagem\LaravelSaasTemplateCore\Services\AbstractCrudService;
use Zevitagem\LaravelSaasTemplateCore\Repositories\Config\CategoryConfigRepository;
use Zevitagem\LaravelSaasTemplateCore\Validators\Config\CategoryConfigValidator;
use Zevitagem\LaravelSaasTemplateCore\Handlers\Config\CategoryConfigHandler;

class CategoryConfigService extends AbstractCrudService
{
    public function __construct(
        CategoryConfigRepository $repository,
        CategoryConfigValidator $validator,
        CategoryConfigHandler $handler
    )
    {
        parent::setRepository($repository);
        parent::setValidator($validator);
        parent::setHandler($handler);
    }

    public function getDataToCreate()
    {
        return [];
    }

    public function getDataToShow(int $id)
    {
        $row = $this->getByIdAndSlug($id);

        return compact('row');
    }

    public function store(array $data)
    {
        return $this->getRepository()->store([
            'name' => $data['name'],
            'key' => $data['key'],
            'active' => $data['active'],
            'slug' => $data['slug']
        ]);
    }

    public function update(array $data)
    {
        $category = $this->getByIdAndSlug($data['id']);

        if (empty($category)) {
            throw new \InvalidArgumentException('Não foi possível encontrar a categoria');
        }

        $category->fill([
            'name' => $data['name'],
            'key' => $data['key'],
            'active' => $data['active'],
        ]);

        return $this->getRepository()->update($category);
    }
}