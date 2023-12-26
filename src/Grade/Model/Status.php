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

namespace Gs2\Grade\Model;

use Gs2\Core\Model\IModel;


class Status implements IModel {
	/**
     * @var string
	 */
	private $statusId;
	/**
     * @var string
	 */
	private $gradeName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var int
	 */
	private $gradeValue;
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
	public function getStatusId(): ?string {
		return $this->statusId;
	}
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
	public function withGradeName(?string $gradeName): Status {
		$this->gradeName = $gradeName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
	public function withGradeValue(?int $gradeValue): Status {
		$this->gradeValue = $gradeValue;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Status {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Status {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Status {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withStatusId(array_key_exists('statusId', $data) && $data['statusId'] !== null ? $data['statusId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withGradeValue(array_key_exists('gradeValue', $data) && $data['gradeValue'] !== null ? $data['gradeValue'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "gradeName" => $this->getGradeName(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "gradeValue" => $this->getGradeValue(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}