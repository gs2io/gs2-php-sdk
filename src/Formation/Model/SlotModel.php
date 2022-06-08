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


class SlotModel implements IModel {
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $propertyRegex;
	/**
     * @var string
	 */
	private $metadata;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SlotModel {
		$this->name = $name;
		return $this;
	}
	public function getPropertyRegex(): ?string {
		return $this->propertyRegex;
	}
	public function setPropertyRegex(?string $propertyRegex) {
		$this->propertyRegex = $propertyRegex;
	}
	public function withPropertyRegex(?string $propertyRegex): SlotModel {
		$this->propertyRegex = $propertyRegex;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
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