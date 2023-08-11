<?php

declare(strict_types=1);

namespace OpenStack\BlockStorage\v3;

use OpenStack\Common\Api\AbstractApi;

class Api extends AbstractApi
{
    public function __construct()
    {
        $this->params = new Params();
    }

    public function postVolumes(): array
    {
        return [
            'method' => 'POST',
            'path' => 'volumes',
            'jsonKey' => 'volume',
            'params' => [
                'availabilityZone' => $this->params->availabilityZone(),
                'sourceVolumeId' => $this->params->sourceVolId(),
                'description' => $this->params->desc(),
                'snapshotId' => $this->params->snapshotId(),
                'size' => $this->params->size(),
                'name' => $this->params->name('volume'),
                'imageId' => $this->params->imageRef(),
                'volumeType' => $this->params->volumeType(),
                'metadata' => $this->params->metadata(),
                'projectId' => $this->params->projectId(),
            ],
        ];
    }

    public function getVolumes(): array
    {
        return [
            'method' => 'GET',
            'path' => 'volumes',
            'params' => [
                'limit' => $this->params->limit(),
                'marker' => $this->params->marker(),
                'sort' => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getVolumesDetail(): array
    {
        return [
            'method' => 'GET',
            'path' => 'volumes/detail',
            'params' => [
                'limit' => $this->params->limit(),
                'marker' => $this->params->marker(),
                'sort' => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getVolume(): array
    {
        return [
            'method' => 'GET',
            'path' => 'volumes/{id}',
            'params' => [
                'id' => $this->params->idPath(),
            ],
        ];
    }

    public function putVolume(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'volumes/{id}',
            'jsonKey' => 'volume',
            'params' => [
                'id' => $this->params->idPath(),
                'name' => $this->params->name('volume'),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function deleteVolume(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'volumes/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function getVolumeMetadata(): array
    {
        return [
            'method' => 'GET',
            'path' => 'volumes/{id}/metadata',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putVolumeMetadata(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'volumes/{id}/metadata',
            'params' => [
                'id' => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getTypes(): array
    {
        return [
            'method' => 'GET',
            'path' => 'types',
            'params' => [],
        ];
    }

    public function postTypes(): array
    {
        return [
            'method' => 'POST',
            'path' => 'types',
            'jsonKey' => 'volume_type',
            'params' => [
                'name' => $this->params->name('volume type'),
                'specs' => $this->params->typeSpecs(),
            ],
        ];
    }

    public function putType(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'types/{id}',
            'jsonKey' => 'volume_type',
            'params' => [
                'id' => $this->params->idPath(),
                'name' => $this->params->name('volume type'),
                'specs' => $this->params->typeSpecs(),
            ],
        ];
    }

    public function getType(): array
    {
        return [
            'method' => 'GET',
            'path' => 'types/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function deleteType(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'types/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function postSnapshots(): array
    {
        return [
            'method' => 'POST',
            'path' => 'snapshots',
            'jsonKey' => 'snapshot',
            'params' => [
                'volumeId' => $this->params->volId(),
                'force' => $this->params->force(),
                'name' => $this->params->snapshotName(),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function getSnapshots(): array
    {
        return [
            'method' => 'GET',
            'path' => 'snapshots',
            'params' => [
                'marker' => $this->params->marker(),
                'limit' => $this->params->limit(),
                'sortDir' => $this->params->sortDir(),
                'sortKey' => $this->params->sortKey(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getSnapshotsDetail(): array
    {
        $api = $this->getSnapshots();
        $api['path'] .= '/detail';

        return $api;
    }

    public function getSnapshot(): array
    {
        return [
            'method' => 'GET',
            'path' => 'snapshots/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putSnapshot(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'snapshots/{id}',
            'jsonKey' => 'snapshot',
            'params' => [
                'id' => $this->params->idPath(),
                'name' => $this->params->snapshotName(),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function deleteSnapshot(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'snapshots/{id}',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function getSnapshotMetadata(): array
    {
        return [
            'method' => 'GET',
            'path' => 'snapshots/{id}/metadata',
            'params' => ['id' => $this->params->idPath()],
        ];
    }

    public function putSnapshotMetadata(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'snapshots/{id}/metadata',
            'params' => [
                'id' => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function getQuotaSet(): array
    {
        return [
            'method' => 'GET',
            'path' => 'os-quota-sets/{tenantId}',
            'params' => [
                'tenantId' => $this->params->idPath('quota-sets'),
            ],
        ];
    }

    public function deleteQuotaSet(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'os-quota-sets/{tenantId}',
            'jsonKey' => 'quota_set',
            'params' => [
                'tenantId' => $this->params->idPath('quota-sets'),
            ],
        ];
    }

    public function putQuotaSet(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'os-quota-sets/{tenantId}',
            'jsonKey' => 'quota_set',
            'params' => [
                'tenantId' => $this->params->idPath(),
                'backupGigabytes' => $this->params->quotaSetBackupGigabytes(),
                'backups' => $this->params->quotaSetBackups(),
                'gigabytes' => $this->params->quotaSetGigabytes(),
                'gigabytesIscsi' => $this->params->quotaSetGigabytesIscsi(),
                'perVolumeGigabytes' => $this->params->quotaSetPerVolumeGigabytes(),
                'snapshots' => $this->params->quotaSetSnapshots(),
                'snapshotsIscsi' => $this->params->quotaSetSnapshotsIscsi(),
                'volumes' => $this->params->quotaSetVolumes(),
                'volumesIscsi' => $this->params->quotaSetVolumesIscsi(),
            ],
        ];
    }

    public function postVolumeBootable(): array
    {
        return [
            'method' => 'POST',
            'path' => 'volumes/{id}/action',
            'jsonKey' => 'os-set_bootable',
            'params' => [
                'id' => $this->params->idPath(),
                'bootable' => $this->params->bootable(),
            ],
        ];
    }

    public function postImageMetadata(): array
    {
        return [
            'method' => 'POST',
            'path' => 'volumes/{id}/action',
            'jsonKey' => 'os-set_image_metadata',
            'params' => [
                'id' => $this->params->idPath(),
                'metadata' => $this->params->metadata(),
            ],
        ];
    }

    public function postResetStatus(): array
    {
        return [
            'method' => 'POST',
            'path' => 'volumes/{id}/action',
            'jsonKey' => 'os-reset_status',
            'params' => [
                'id' => $this->params->idPath(),
                'status' => $this->params->volumeStatus(),
                'migrationStatus' => $this->params->volumeMigrationStatus(),
                'attachStatus' => $this->params->volumeAttachStatus(),
            ],
        ];
    }

    public function deleteAttachment(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'attachments/{attachmentId}',
            'params' => [
                'attachmentId' => $this->params->attachmentId(),
            ],
        ];
    }

    public function getBackups(): array
    {
        return [
            'method' => 'GET',
            'path' => 'backups',
            'params' => [
                'marker' => $this->params->marker(),
                'limit' => $this->params->limit(),
                'sort' => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getBackupsDetails(): array
    {
        return [
            'method' => 'GET',
            'path' => 'backups/detail',
            'params' => [
                'limit' => $this->params->limit(),
                'marker' => $this->params->marker(),
                'sort' => $this->params->sort(),
                'allTenants' => $this->params->allTenants(),
            ],
        ];
    }

    public function getBackup(): array
    {
        return [
            'method' => 'GET',
            'path' => 'backups/{id}',
            'params' => [
                'id' => $this->params->idPath()
            ],
        ];
    }

    public function postBackups(): array
    {
        return [
            'method' => 'POST',
            'path' => 'backups',
            'jsonKey' => 'backup',
            'params' => [
                'volumeId' => $this->params->volId(),
                'name' => $this->params->name('backup'),
                'description' => $this->params->desc(),
                'force' => $this->params->force(),
                'availabilityZone' => $this->params->availabilityZone(),
                'snapshotId' => $this->params->snapshotId(),
                'metadata' => $this->params->metadata(),
                'projectId' => $this->params->projectId(),
            ],
        ];
    }

    public function putBackup(): array
    {
        return [
            'method' => 'PUT',
            'path' => 'backups/{id}',
            'jsonKey' => 'backup',
            'params' => [
                'id' => $this->params->idPath(),
                'name' => $this->params->name('backup'),
                'description' => $this->params->desc(),
            ],
        ];
    }

    public function deleteBackup(): array
    {
        return [
            'method' => 'DELETE',
            'path' => 'backups/{id}',
            'params' => [
                'id' => $this->params->idPath(),
            ],
        ];
    }

    public function restoreBackup(): array
    {
        return [
            'method' => 'POST',
            'path' => 'backups/{id}/restore',
            'jsonKey' => 'restore',
            'params' => [
                'id' => $this->params->idPath(),
                'volumeId' => $this->params->volId(),
                'name' => $this->params->name('volume'),
                'projectId' => $this->params->projectId(),
            ],
        ];
    }

}