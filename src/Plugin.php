<?php

namespace markhuot\craftmcp;

use Craft;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;

/**
 * MCP plugin
 *
 * @method static Plugin getInstance()
 * @author Mark Huot <mark@markhuot.com>
 * @copyright Mark Huot
 * @license MIT
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = false;
    public bool $hasCpSection = false;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        parent::init();

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function() {
            $this->attachEventHandlers();
            // ...
        });
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)
    }
}