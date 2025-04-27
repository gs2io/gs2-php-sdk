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


class UnleashRateModel implements IModel {
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
	public function getUnleashRateModelId(): ?string {
		return $this->unleashRateModelId;
	}
	public function setUnleashRateModelId(?string $unleashRateModelId) {
		$this->unleashRateModelId = $unleashRateModelId;
	}
	public function withUnleashRateModelId(?string $unleashRateModelId): UnleashRateModel {
		$this->unleashRateModelId = $unleashRateModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): UnleashRateModel {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UnleashRateModel {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): UnleashRateModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UnleashRateModel {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
	public function withGradeModelId(?string $gradeModelId): UnleashRateModel {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
	public function withGradeEntries(?array $gradeEntries): UnleashRateModel {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRateModel {
        if ($data === null) {
            return null;
        }
        return (new UnleashRateModel())
            ->withUnleashRateModelId(array_key_exists('unleashRateModelId', $data) && $data['unleashRateModelId'] !== null ? $data['unleashRateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGradeEntries(!array_key_exists('gradeEntries', $data) || $data['gradeEntries'] === null ? null : array_map(
                function ($item) {
                    return UnleashRateEntryModel::fromJson($item);
                },
                $data['gradeEntries']
            ));
    }

    public function toJson(): array {
        return array(
            "unleashRateModelId" => $this->getUnleashRateModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeEntries" => $this->getGradeEntries() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries()
            ),
        );
    }
}