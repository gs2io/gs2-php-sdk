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
 * Property Form
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#propertyform
 */
class PropertyForm implements IModel {
	/**
     * @var string Property Form GRN
	 */
	private $formId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Property Form name
	 */
	private $name;
	/**
     * @var string Property ID
	 */
	private $propertyId;
	/**
     * @var array List of Slots
	 */
	private $slots;
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
    /** @return string|null Property Form GRN */
	public function getFormId(): ?string {
		return $this->formId;
	}
    /** @param string|null $formId Property Form GRN */
	public function setFormId(?string $formId) {
		$this->formId = $formId;
	}
    /**
     * @param string|null $formId Property Form GRN
     * @return PropertyForm
     */
	public function withFormId(?string $formId): PropertyForm {
		$this->formId = $formId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return PropertyForm
     */
	public function withUserId(?string $userId): PropertyForm {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Property Form name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Property Form name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Property Form name
     * @return PropertyForm
     */
	public function withName(?string $name): PropertyForm {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return PropertyForm
     */
	public function withPropertyId(?string $propertyId): PropertyForm {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of Slots */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slots */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slots
     * @return PropertyForm
     */
	public function withSlots(?array $slots): PropertyForm {
		$this->slots = $slots;
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
     * @return PropertyForm
     */
	public function withCreatedAt(?int $createdAt): PropertyForm {
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
     * @return PropertyForm
     */
	public function withUpdatedAt(?int $updatedAt): PropertyForm {
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
     * @return PropertyForm
     */
	public function withRevision(?int $revision): PropertyForm {
		$this->revision = $revision;
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
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return Slot::fromJson($item);
                },
                $data['slots']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "formId" => $this->getFormId(),
            "userId" => $this->getUserId(),
            "name" => $this->getName(),
            "propertyId" => $this->getPropertyId(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}