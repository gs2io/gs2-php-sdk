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


/**
 * Maximum Stamina Table Master
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#maxstaminatablemaster
 */
class MaxStaminaTableMaster implements IModel {
	/**
     * @var string Maximum Stamina Table Master GRN
	 */
	private $maxStaminaTableId;
	/**
     * @var string Maximum Stamina Value Table Name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Experience Model ID
	 */
	private $experienceModelId;
	/**
     * @var array Maximum Stamina Values by Rank
	 */
	private $values;
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
    /** @return string|null Maximum Stamina Table Master GRN */
	public function getMaxStaminaTableId(): ?string {
		return $this->maxStaminaTableId;
	}
    /** @param string|null $maxStaminaTableId Maximum Stamina Table Master GRN */
	public function setMaxStaminaTableId(?string $maxStaminaTableId) {
		$this->maxStaminaTableId = $maxStaminaTableId;
	}
    /**
     * @param string|null $maxStaminaTableId Maximum Stamina Table Master GRN
     * @return MaxStaminaTableMaster
     */
	public function withMaxStaminaTableId(?string $maxStaminaTableId): MaxStaminaTableMaster {
		$this->maxStaminaTableId = $maxStaminaTableId;
		return $this;
	}
    /** @return string|null Maximum Stamina Value Table Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Maximum Stamina Value Table Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Maximum Stamina Value Table Name
     * @return MaxStaminaTableMaster
     */
	public function withName(?string $name): MaxStaminaTableMaster {
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
     * @return MaxStaminaTableMaster
     */
	public function withMetadata(?string $metadata): MaxStaminaTableMaster {
		$this->metadata = $metadata;
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
     * @return MaxStaminaTableMaster
     */
	public function withDescription(?string $description): MaxStaminaTableMaster {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Experience Model ID */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model ID */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model ID
     * @return MaxStaminaTableMaster
     */
	public function withExperienceModelId(?string $experienceModelId): MaxStaminaTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null Maximum Stamina Values by Rank */
	public function getValues(): ?array {
		return $this->values;
	}
    /** @param array|null $values Maximum Stamina Values by Rank */
	public function setValues(?array $values) {
		$this->values = $values;
	}
    /**
     * @param array|null $values Maximum Stamina Values by Rank
     * @return MaxStaminaTableMaster
     */
	public function withValues(?array $values): MaxStaminaTableMaster {
		$this->values = $values;
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
     * @return MaxStaminaTableMaster
     */
	public function withCreatedAt(?int $createdAt): MaxStaminaTableMaster {
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
     * @return MaxStaminaTableMaster
     */
	public function withUpdatedAt(?int $updatedAt): MaxStaminaTableMaster {
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
     * @return MaxStaminaTableMaster
     */
	public function withRevision(?int $revision): MaxStaminaTableMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?MaxStaminaTableMaster {
        if ($data === null) {
            return null;
        }
        return (new MaxStaminaTableMaster())
            ->withMaxStaminaTableId(array_key_exists('maxStaminaTableId', $data) && $data['maxStaminaTableId'] !== null ? $data['maxStaminaTableId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(!array_key_exists('values', $data) || $data['values'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['values']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "maxStaminaTableId" => $this->getMaxStaminaTableId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "experienceModelId" => $this->getExperienceModelId(),
            "values" => $this->getValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getValues()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}