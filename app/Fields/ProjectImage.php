<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class ProjectImage extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('project_image', ['position' => 'side']);

        $fields
            ->setLocation('post_type', '==', 'project')
            ->addImage('project_image', [
                'return_format' => 'id',
                'required' => true,
            ]);
            
        return $fields->build();
    }
}
