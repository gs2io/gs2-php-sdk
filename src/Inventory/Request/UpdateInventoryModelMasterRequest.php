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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UpdateInventoryModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $inventoryName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $initialCapacity;
    /** @var int */
    private $maxCapacity;
    /** @var bool */
    private $protectReferencedItem;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateInventoryModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	public function withInventoryName(?string $inventoryName): UpdateInventoryModelMasterRequest {
		$this->inventoryName = $inventoryName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateInventoryModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateInventoryModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}

	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}

	public function withInitialCapacity(?int $initialCapacity): UpdateInventoryModelMasterRequest {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): UpdateInventoryModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}

	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}

	public function withProtectReferencedItem(?bool $protectReferencedItem): UpdateInventoryModelMasterRequest {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateInventoryModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateInventoryModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withInventoryName(empty($data['inventoryName']) ? null : $data['inventoryName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withInitialCapacity(empty($data['initialCapacity']) ? null : $data['initialCapacity'])
            ->withMaxCapacity(empty($data['maxCapacity']) ? null : $data['maxCapacity'])
            ->withProtectReferencedItem(empty($data['protectReferencedItem']) ? null : $data['protectReferencedItem']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "inventoryName" => $this->getInventoryName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "initialCapacity" => $this->getInitialCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "protectReferencedItem" => $this->getProtectReferencedItem(),
        );
    }
}