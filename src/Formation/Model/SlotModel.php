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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


/**
 * Slot Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#slotmodel
 */
class SlotModel implements IModel {
	/**
     * @var string Slot Model name
	 */
	private $name;
	/**
     * @var string Regular expressions for values that can be set as properties
	 */
	private $propertyRegex;
	/**
     * @var string Metadata
	 */
	private $metadata;
    /** @return string|null Slot Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Slot Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Slot Model name
     * @return SlotModel
     */
	public function withName(?string $name): SlotModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Regular expressions for values that can be set as properties */
	public function getPropertyRegex(): ?string {
		return $this->propertyRegex;
	}
    /** @param string|null $propertyRegex Regular expressions for values that can be set as properties */
	public function setPropertyRegex(?string $propertyRegex) {
		$this->propertyRegex = $propertyRegex;
	}
    /**
     * @param string|null $propertyRegex Regular expressions for values that can be set as properties
     * @return SlotModel
     */
	public function withPropertyRegex(?string $propertyRegex): SlotModel {
		$this->propertyRegex = $propertyRegex;
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
     * @return SlotModel
     */
	public function withMetadata(?string $metadata): SlotModel {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?SlotModel {
        if ($data === null) {
            return null;
        }
        return (new SlotModel())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withPropertyRegex(array_key_exists('propertyRegex', $data) && $data['propertyRegex'] !== null ? $data['propertyRegex'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "propertyRegex" => $this->getPropertyRegex(),
            "metadata" => $this->getMetadata(),
        );
    }
}