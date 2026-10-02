<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;


/**
 * Distributor Model Master
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distributormodelmaster
 */
class DistributorModelMaster implements IModel {
	/**
     * @var string Distributor Model Master GRN
	 */
	private $distributorModelId;
	/**
     * @var string Distributor Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string GS2-Inbox Namespace GRN to transfer overflow resources
	 */
	private $inboxNamespaceId;
	/**
     * @var array Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor
	 */
	private $whiteListTargetIds;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Distributor Model Master GRN */
	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}
    /** @param string|null $distributorModelId Distributor Model Master GRN */
	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}
    /**
     * @param string|null $distributorModelId Distributor Model Master GRN
     * @return DistributorModelMaster
     */
	public function withDistributorModelId(?string $distributorModelId): DistributorModelMaster {
		$this->distributorModelId = $distributorModelId;
		return $this;
	}
    /** @return string|null Distributor Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Distributor Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Distributor Model name
     * @return DistributorModelMaster
     */
	public function withName(?string $name): DistributorModelMaster {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return DistributorModelMaster
     */
	public function withDescription(?string $description): DistributorModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return DistributorModelMaster
     */
	public function withMetadata(?string $metadata): DistributorModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null GS2-Inbox Namespace GRN to transfer overflow resources */
	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}
    /** @param string|null $inboxNamespaceId GS2-Inbox Namespace GRN to transfer overflow resources */
	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}
    /**
     * @param string|null $inboxNamespaceId GS2-Inbox Namespace GRN to transfer overflow resources
     * @return DistributorModelMaster
     */
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModelMaster {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}
    /** @return array|null Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor */
	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}
    /** @param array|null $whiteListTargetIds Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor */
	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}
    /**
     * @param array|null $whiteListTargetIds Whitelist of target resource GRN prefixes that can be processed through GS2-Distributor
     * @return DistributorModelMaster
     */
	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModelMaster {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return DistributorModelMaster
     */
	public function withCreatedAt(?int $createdAt): DistributorModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return DistributorModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): DistributorModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return DistributorModelMaster
     */
	public function withRevision(?int $revision): DistributorModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributorModelMaster {
        if ($data === null) {
            return null;
        }
        return (new DistributorModelMaster())
            ->withDistributorModelId(array_key_exists('distributorModelId', $data) && $data['distributorModelId'] !== null ? $data['distributorModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInboxNamespaceId(array_key_exists('inboxNamespaceId', $data) && $data['inboxNamespaceId'] !== null ? $data['inboxNamespaceId'] : null)
            ->withWhiteListTargetIds(!array_key_exists('whiteListTargetIds', $data) || $data['whiteListTargetIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['whiteListTargetIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "distributorModelId" => $this->getDistributorModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "whiteListTargetIds" => $this->getWhiteListTargetIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListTargetIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}