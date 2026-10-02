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
 * Form
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#form
 */
class Form implements IModel {
	/**
     * @var string Form GRN
	 */
	private $formId;
	/**
     * @var string Form name
	 */
	private $name;
	/**
     * @var int Index of form
	 */
	private $index;
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
    /** @return string|null Form GRN */
	public function getFormId(): ?string {
		return $this->formId;
	}
    /** @param string|null $formId Form GRN */
	public function setFormId(?string $formId) {
		$this->formId = $formId;
	}
    /**
     * @param string|null $formId Form GRN
     * @return Form
     */
	public function withFormId(?string $formId): Form {
		$this->formId = $formId;
		return $this;
	}
    /** @return string|null Form name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Form name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Form name
     * @return Form
     */
	public function withName(?string $name): Form {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Index of form */
	public function getIndex(): ?int {
		return $this->index;
	}
    /** @param int|null $index Index of form */
	public function setIndex(?int $index) {
		$this->index = $index;
	}
    /**
     * @param int|null $index Index of form
     * @return Form
     */
	public function withIndex(?int $index): Form {
		$this->index = $index;
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
     * @return Form
     */
	public function withSlots(?array $slots): Form {
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
     * @return Form
     */
	public function withCreatedAt(?int $createdAt): Form {
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
     * @return Form
     */
	public function withUpdatedAt(?int $updatedAt): Form {
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
     * @return Form
     */
	public function withRevision(?int $revision): Form {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Form {
        if ($data === null) {
            return null;
        }
        return (new Form())
            ->withFormId(array_key_exists('formId', $data) && $data['formId'] !== null ? $data['formId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
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
            "name" => $this->getName(),
            "index" => $this->getIndex(),
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