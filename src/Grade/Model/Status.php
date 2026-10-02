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


/**
 * Status
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#status
 */
class Status implements IModel {
	/**
     * @var string Status GRN
	 */
	private $statusId;
	/**
     * @var string Grade Model Name
	 */
	private $gradeName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Property ID
	 */
	private $propertyId;
	/**
     * @var int Current Grade
	 */
	private $gradeValue;
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
    /** @return string|null Status GRN */
	public function getStatusId(): ?string {
		return $this->statusId;
	}
    /** @param string|null $statusId Status GRN */
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
    /**
     * @param string|null $statusId Status GRN
     * @return Status
     */
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
    /** @return string|null Grade Model Name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model Name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model Name
     * @return Status
     */
	public function withGradeName(?string $gradeName): Status {
		$this->gradeName = $gradeName;
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
     * @return Status
     */
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
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
     * @return Status
     */
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Current Grade */
	public function getGradeValue(): ?int {
		return $this->gradeValue;
	}
    /** @param int|null $gradeValue Current Grade */
	public function setGradeValue(?int $gradeValue) {
		$this->gradeValue = $gradeValue;
	}
    /**
     * @param int|null $gradeValue Current Grade
     * @return Status
     */
	public function withGradeValue(?int $gradeValue): Status {
		$this->gradeValue = $gradeValue;
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
     * @return Status
     */
	public function withCreatedAt(?int $createdAt): Status {
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
     * @return Status
     */
	public function withUpdatedAt(?int $updatedAt): Status {
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
     * @return Status
     */
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