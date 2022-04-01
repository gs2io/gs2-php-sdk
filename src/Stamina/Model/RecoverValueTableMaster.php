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


class RecoverValueTableMaster implements IModel {
	/**
     * @var string
	 */
	private $recoverValueTableId;
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

	public function getRecoverValueTableId(): ?string {
		return $this->recoverValueTableId;
	}

	public function setRecoverValueTableId(?string $recoverValueTableId) {
		$this->recoverValueTableId = $recoverValueTableId;
	}

	public function withRecoverValueTableId(?string $recoverValueTableId): RecoverValueTableMaster {
		$this->recoverValueTableId = $recoverValueTableId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): RecoverValueTableMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): RecoverValueTableMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): RecoverValueTableMaster {
		$this->description = $description;
		return $this;
	}

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): RecoverValueTableMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getValues(): ?array {
		return $this->values;
	}

	public function setValues(?array $values) {
		$this->values = $values;
	}

	public function withValues(?array $values): RecoverValueTableMaster {
		$this->values = $values;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): RecoverValueTableMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): RecoverValueTableMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?RecoverValueTableMaster {
        if ($data === null) {
            return null;
        }
        return (new RecoverValueTableMaster())
            ->withRecoverValueTableId(array_key_exists('recoverValueTableId', $data) && $data['recoverValueTableId'] !== null ? $data['recoverValueTableId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withValues(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('values', $data) && $data['values'] !== null ? $data['values'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "recoverValueTableId" => $this->getRecoverValueTableId(),
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