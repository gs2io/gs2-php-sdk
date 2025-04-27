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


class DistributorModel implements IModel {
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
	private $metadata;
	/**
     * @var string
	 */
	private $inboxNamespaceId;
	/**
     * @var array
	 */
	private $whiteListTargetIds;
	public function getDistributorModelId(): ?string {
		return $this->distributorModelId;
	}
	public function setDistributorModelId(?string $distributorModelId) {
		$this->distributorModelId = $distributorModelId;
	}
	public function withDistributorModelId(?string $distributorModelId): DistributorModel {
		$this->distributorModelId = $distributorModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): DistributorModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): DistributorModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}
	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}
	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributorModel {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}
	public function getWhiteListTargetIds(): ?array {
		return $this->whiteListTargetIds;
	}
	public function setWhiteListTargetIds(?array $whiteListTargetIds) {
		$this->whiteListTargetIds = $whiteListTargetIds;
	}
	public function withWhiteListTargetIds(?array $whiteListTargetIds): DistributorModel {
		$this->whiteListTargetIds = $whiteListTargetIds;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributorModel {
        if ($data === null) {
            return null;
        }
        return (new DistributorModel())
            ->withDistributorModelId(array_key_exists('distributorModelId', $data) && $data['distributorModelId'] !== null ? $data['distributorModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInboxNamespaceId(array_key_exists('inboxNamespaceId', $data) && $data['inboxNamespaceId'] !== null ? $data['inboxNamespaceId'] : null)
            ->withWhiteListTargetIds(!array_key_exists('whiteListTargetIds', $data) || $data['whiteListTargetIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['whiteListTargetIds']
            ));
    }

    public function toJson(): array {
        return array(
            "distributorModelId" => $this->getDistributorModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "whiteListTargetIds" => $this->getWhiteListTargetIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListTargetIds()
            ),
        );
    }
}