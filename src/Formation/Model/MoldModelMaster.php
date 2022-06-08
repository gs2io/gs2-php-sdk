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


class MoldModelMaster implements IModel {
	/**
     * @var string
	 */
	private $moldModelId;
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
     * @var int
	 */
	private $initialMaxCapacity;
	/**
     * @var int
	 */
	private $maxCapacity;
	/**
     * @var string
	 */
	private $formModelName;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getMoldModelId(): ?string {
		return $this->moldModelId;
	}
	public function setMoldModelId(?string $moldModelId) {
		$this->moldModelId = $moldModelId;
	}
	public function withMoldModelId(?string $moldModelId): MoldModelMaster {
		$this->moldModelId = $moldModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): MoldModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): MoldModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): MoldModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}
	public function withInitialMaxCapacity(?int $initialMaxCapacity): MoldModelMaster {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
	public function withMaxCapacity(?int $maxCapacity): MoldModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}
	public function withFormModelName(?string $formModelName): MoldModelMaster {
		$this->formModelName = $formModelName;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): MoldModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): MoldModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?MoldModelMaster {
        if ($data === null) {
            return null;
        }
        return (new MoldModelMaster())
            ->withMoldModelId(array_key_exists('moldModelId', $data) && $data['moldModelId'] !== null ? $data['moldModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialMaxCapacity(array_key_exists('initialMaxCapacity', $data) && $data['initialMaxCapacity'] !== null ? $data['initialMaxCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "moldModelId" => $this->getMoldModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "formModelName" => $this->getFormModelName(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}