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


class MaxStaminaTableMaster implements IModel {
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
	private $description;
	/**
     * @var string
	 */
	private $experienceModelId;
	/**
     * @var array
	 */
	private $values;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getMaxStaminaTableId(): ?string {
		return $this->maxStaminaTableId;
	}

	public function setMaxStaminaTableId(?string $maxStaminaTableId) {
		$this->maxStaminaTableId = $maxStaminaTableId;
	}

	public function withMaxStaminaTableId(?string $maxStaminaTableId): MaxStaminaTableMaster {
		$this->maxStaminaTableId = $maxStaminaTableId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): MaxStaminaTableMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): MaxStaminaTableMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): MaxStaminaTableMaster {
		$this->description = $description;
		return $this;
	}

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): MaxStaminaTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getValues(): ?array {
		return $this->values;
	}

	public function setValues(?array $values) {
		$this->values = $values;
	}

	public function withValues(?array $values): MaxStaminaTableMaster {
		$this->values = $values;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): MaxStaminaTableMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): MaxStaminaTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?MaxStaminaTableMaster {
        if ($data === null) {
            return null;
        }
        return (new MaxStaminaTableMaster())
            ->withMaxStaminaTableId(empty($data['maxStaminaTableId']) ? null : $data['maxStaminaTableId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withExperienceModelId(empty($data['experienceModelId']) ? null : $data['experienceModelId'])
            ->withValues(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('values', $data) && $data['values'] !== null ? $data['values'] : []
            ))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "maxStaminaTableId" => $this->getMaxStaminaTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues() !== null && $this->getValues() !== null ? $this->getValues() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}