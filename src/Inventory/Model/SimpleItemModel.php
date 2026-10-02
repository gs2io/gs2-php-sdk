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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Simple Item Model
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleitemmodel
 */
class SimpleItemModel implements IModel {
	/**
     * @var string Simple Item Model GRN
	 */
	private $itemModelId;
	/**
     * @var string Simple Item Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
    /** @return string|null Simple Item Model GRN */
	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}
    /** @param string|null $itemModelId Simple Item Model GRN */
	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}
    /**
     * @param string|null $itemModelId Simple Item Model GRN
     * @return SimpleItemModel
     */
	public function withItemModelId(?string $itemModelId): SimpleItemModel {
		$this->itemModelId = $itemModelId;
		return $this;
	}
    /** @return string|null Simple Item Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Simple Item Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Simple Item Model name
     * @return SimpleItemModel
     */
	public function withName(?string $name): SimpleItemModel {
		$this->name = $name;
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
     * @return SimpleItemModel
     */
	public function withMetadata(?string $metadata): SimpleItemModel {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleItemModel {
        if ($data === null) {
            return null;
        }
        return (new SimpleItemModel())
            ->withItemModelId(array_key_exists('itemModelId', $data) && $data['itemModelId'] !== null ? $data['itemModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "itemModelId" => $this->getItemModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
        );
    }
}