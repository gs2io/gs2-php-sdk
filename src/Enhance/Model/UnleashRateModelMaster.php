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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


class UnleashRateModelMaster implements IModel {
	/**
     * @var string
	 */
	private $unleashRateModelId;
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
	private $targetInventoryModelId;
	/**
     * @var string
	 */
	private $gradeModelId;
	/**
     * @var array
	 */
	private $gradeEntries;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getUnleashRateModelId(): ?string {
		return $this->unleashRateModelId;
	}
	public function setUnleashRateModelId(?string $unleashRateModelId) {
		$this->unleashRateModelId = $unleashRateModelId;
	}
	public function withUnleashRateModelId(?string $unleashRateModelId): UnleashRateModelMaster {
		$this->unleashRateModelId = $unleashRateModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): UnleashRateModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UnleashRateModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UnleashRateModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UnleashRateModelMaster {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
	public function withGradeModelId(?string $gradeModelId): UnleashRateModelMaster {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
	public function withGradeEntries(?array $gradeEntries): UnleashRateModelMaster {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): UnleashRateModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): UnleashRateModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): UnleashRateModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRateModelMaster {
        if ($data === null) {
            return null;
        }
        return (new UnleashRateModelMaster())
            ->withUnleashRateModelId(array_key_exists('unleashRateModelId', $data) && $data['unleashRateModelId'] !== null ? $data['unleashRateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGradeEntries(array_map(
                function ($item) {
                    return UnleashRateEntryModel::fromJson($item);
                },
                array_key_exists('gradeEntries', $data) && $data['gradeEntries'] !== null ? $data['gradeEntries'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "unleashRateModelId" => $this->getUnleashRateModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeEntries" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries() !== null && $this->getGradeEntries() !== null ? $this->getGradeEntries() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}