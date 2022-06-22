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


class PropertyForm implements IModel {
	/**
     * @var string
	 */
	private $formId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var array
	 */
	private $slots;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getFormId(): ?string {
		return $this->formId;
	}
	public function setFormId(?string $formId) {
		$this->formId = $formId;
	}
	public function withFormId(?string $formId): PropertyForm {
		$this->formId = $formId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): PropertyForm {
		$this->userId = $userId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): PropertyForm {
		$this->name = $name;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): PropertyForm {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getSlots(): ?array {
		return $this->slots;
	}
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
	public function withSlots(?array $slots): PropertyForm {
		$this->slots = $slots;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): PropertyForm {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): PropertyForm {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?PropertyForm {
        if ($data === null) {
            return null;
        }
        return (new PropertyForm())
            ->withFormId(array_key_exists('formId', $data) && $data['formId'] !== null ? $data['formId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withSlots(array_map(
                function ($item) {
                    return Slot::fromJson($item);
                },
                array_key_exists('slots', $data) && $data['slots'] !== null ? $data['slots'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "formId" => $this->getFormId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "propertyId" => $this->getPropertyId(),
            "slots" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots() !== null && $this->getSlots() !== null ? $this->getSlots() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}