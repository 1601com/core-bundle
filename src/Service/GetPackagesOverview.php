<?php

namespace Agentur1601com\CoreBundle\Service;

use Packagist\Api\Client;

class GetPackagesOverview
{
    /**
     * @var Client
     */
    private $_client;

    /**
     * GetPackagesOverview constructor.
     */
    public function __construct()
    {
        $this->_client = new Client();
    }

    /**
     * @return array|null
     */
    public function execute(): ?array
    {
        $packageResult = [];

        foreach ($this->_client->search('agentur1601com') as $result) {
            $packageResult[] = [
                'name' => $result->getName(),
                'description' => $result->getDescription(),
                'url' => $result->getUrl(),
                'downloads' => $result->getDownloads()
            ];
        }

        return $packageResult;
    }
}