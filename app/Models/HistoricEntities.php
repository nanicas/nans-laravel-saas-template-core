<?php

namespace Zevitagem\LaravelSaasTemplateCore\Models;

use Zevitagem\LaravelSaasTemplateCore\Models\AbstractModel;

class HistoricEntities extends AbstractModel
{
    const PRIMARY_KEY = 'id';

    protected $table = 'historic_entities';
    protected $fillable = [
        'historic_id',
        'entity_id',
        'entity_type',
    ];

    public function getEntityType()
    {
        return $this->entity_type;
    }

    public function getEntityId()
    {
        return $this->entity_id;
    }

}
