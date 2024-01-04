<?php

namespace OpenStack\Integration\BlockStorage\v2;

use OpenStack\BlockStorage\v2\Service;
use OpenStack\Integration\BlockStorage\v3\CoreV2Test;
use OpenStack\Integration\Utils;

class CoreTest extends CoreV2Test
{
    protected function getService() : Service
    {
        if (null === $this->service) {
            $this->service = Utils::getOpenStack()->blockStorageV2();
        }

        return $this->service;
    }

    protected function sampleFile(array $replacements, $path)
    {
        return parent::sampleFile(
            array_merge(
                $replacements,
                ['$openstack->blockStorageV3()' => '$openstack->blockStorageV2()']
            ),
            '../v3/' . $path);
    }
}
