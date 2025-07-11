<?php

namespace markhuot\craftmcp\tools;

use Craft;

class GetSections
{
    /**
     * Get a list of sections and entry types in Craft CMS. This is helpful for creating new entries because
     * you must pass a section ID and entry type ID when creating a new entry. This can also be helpful to
     * orient yourself with the structure of the site.
     */
    public function __invoke(): array
    {
        $sections = Craft::$app->getEntries()->getAllSections();
        
        $result = [];
        foreach ($sections as $section) {
            $entryTypes = [];
            foreach ($section->getEntryTypes() as $entryType) {
                $entryTypes[] = [
                    'id' => $entryType->id,
                    'handle' => $entryType->handle,
                    'name' => $entryType->name,
                ];
            }
            
            $result[] = [
                'id' => $section->id,
                'handle' => $section->handle,
                'name' => $section->name,
                'type' => $section->type,
                'entryTypes' => $entryTypes,
            ];
        }
        
        return $result;
    }
}
