<?php

namespace berthott\NgLaravel\Services;

use berthott\NgLaravel\Exceptions\NgBuildServiceException;
use JsonMachine\Items;
use Exception;

/**
 * Service to handle angular assets.
 */
class NgBuildService
{
    /**
     * The cached assets.
     * 
     * We'll cache our assets hash here, so we don't have to
     * constantly extract the values from stats.json
     */
    private $assets = [];

    public function __construct()
    {
        $this->extractAndCache();
    }

    /**
     * Extract and cache the assets.
     * 
     * Extracts all bundle assets from public/build/stats.json
     * in the format: 
     * ```json
     * {
     *  "assetFileName": "assetHasheFileName"
     * }
     * ```
     */
    private function extractAndCache()
    {
        $path = config('angular.output') . '/stats.json';

        try {
            $assets = Items::fromFile($path, ['pointer' => '/assets']);
            foreach ($assets as $key => $asset) {
                $name = $asset->name;
                if ($asset->chunkNames && count($asset->chunkNames)) {
                    $this->assets[$asset->chunkNames[0]] = $name;
                } else {
                    $this->assets[$name] = $name;
                }
            }
        } catch (Exception $e) {
            // only catch the error
        }
    }

    /**
     * Get the cached assets and throw an error when empty
     * 
     * @throws \berthott\NgLaravel\Exceptions\NgBuildServiceException
     */
    public function assets()
    {
        if (empty($this->assets) && !file_exists(config('angular.output') . '/main.js')) {
            throw new NgBuildServiceException;
        }
        return $this->assets;
    }
}