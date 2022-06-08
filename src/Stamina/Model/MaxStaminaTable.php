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

namespace Gs2\Stamina\Model;

use Gs2\Core\Model\IModel;


class MaxStaminaTable implements IModel {
	/**
     * @var string
	 */
	private $maxStaminaTableId;
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
	private $experienceModelId;
	/**
     * @var array
	 */
	private $values;
	public function getMaxStaminaTableId(): ?string {
		return $this->maxStaminaTableId;
	}
	public function setMaxStaminaTableId(?string $maxStaminaTableId) {
		$this->maxStaminaTableId = $maxStaminaTableId;
	}
	public function withMaxStaminaTableId(?string $maxStaminaTableId): MaxStaminaTable {
		$this->maxStaminaTableId = $maxStaminaTableId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): MaxStaminaTable {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): MaxStaminaTable {
		$this->metadata = $metadata;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): MaxStaminaTable {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getValues(): ?array {
		return $this->values;
	}
	public function setValues(?array $values) {
		$this->values = $values;
	}
	public function withValues(?array $values): MaxStaminaTable {
		$this->values = $values;
		return $this;
	}

    public static function fromJson(?array $data): ?MaxStaminaTable {
        if ($data === null) {
            return null;
        }
        return (new MaxStaminaTable())
            ->withMaxStaminaTableId(array_key_exists('maxStaminaTableId', $data) && $data['maxStaminaTableId'] !== null ? $data['maxStaminaTableId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('values', $data) && $data['values'] !== null ? $data['values'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "maxStaminaTableId" => $this->getMaxStaminaTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues() !== null && $this->getValues() !== null ? $this->getValues() : []
            ),
        );
    }
}