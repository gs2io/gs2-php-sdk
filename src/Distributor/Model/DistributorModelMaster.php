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


class DistributorModelMaster implements IModel {
	/**
     * @var string
	 */
	private $distributorModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $inboxNamespaceId;
	/**
     * @var array
	 */
	private $whiteListTargetIds;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}

	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}

	public function withDistributorModelId(?string $distributorModelId): DistributorModelMaster {
		$this->distributorModelId = $distributorModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): DistributorModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): DistributorModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): DistributorModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModelMaster {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}

	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}

	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}

	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModelMaster {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): DistributorModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): DistributorModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributorModelMaster {
        if ($data === null) {
            return null;
        }
        return (new DistributorModelMaster())
            ->withDistributorModelId(empty($data['distributorModelId']) ? null : $data['distributorModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withInboxNamespaceId(empty($data['inboxNamespaceId']) ? null : $data['inboxNamespaceId'])
            ->withWhiteListTargetIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('whiteListTargetIds', $data) && $data['whiteListTargetIds'] !== null ? $data['whiteListTargetIds'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "distributorModelId" => $this->getDistributorModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "whiteListTargetIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListTargetIds() !== null && $this->getWhiteListTargetIds() !== null ? $this->getWhiteListTargetIds() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}