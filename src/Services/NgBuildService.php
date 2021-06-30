<?php

namespace berthott\NgLaravel\Services;

use berthott\NgLaravel\Exceptions\NgBuildServiceException;
use Exception;

class NgBuildService
{
    // We'll cache our assets hash here, so we don't have to
    // constantly extract the values from stats.json
    public $assets = array();

    public function __construct()
    {
        $this->extractAndCache();
    }

    /**
    * Extracts all bundle assets from public/build/stats.json
    * in the format: 
    * {
    *  "assetFileName": "assetHasheFileName"
    * }
    */
    private function extractAndCache()
    {
        $path = public_path('assets/angular') . '/stats.json';

        try {
            $json = json_decode(file_get_contents($path), true);

            if (isset($json['assets']) && count($json['assets'])) {
                foreach ($json['assets'] as $asset) {
                    $name = $asset['name'];

                    if ($asset['chunkNames'] && count($asset['chunkNames'])) {
                        $this->assets[$asset['chunkNames'][0]] = $name;
                    } else {
                        $this->assets[$name] = $name;
                    }
                }
            }
        } catch (Exception $e) {
          throw new NgBuildServiceException;
        }
    }
}