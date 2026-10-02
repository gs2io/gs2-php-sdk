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

namespace Gs2\Datastore\Model;

use Gs2\Core\Model\IModel;


/**
 * Data Object
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#dataobject
 */
class DataObject implements IModel {
	/**
     * @var string Data object GRN
	 */
	private $dataObjectId;
	/**
     * @var string Data Object Name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string File access permission
	 */
	private $scope;
	/**
     * @var array List of user IDs to be published
	 */
	private $allowUserIds;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var string Data Generation
	 */
	private $generation;
	/**
     * @var string Generation of previously valid data
	 */
	private $previousGeneration;
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
    /** @return string|null Data object GRN */
	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}
    /** @param string|null $dataObjectId Data object GRN */
	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}
    /**
     * @param string|null $dataObjectId Data object GRN
     * @return DataObject
     */
	public function withDataObjectId(?string $dataObjectId): DataObject {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}
    /** @return string|null Data Object Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Data Object Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Data Object Name
     * @return DataObject
     */
	public function withName(?string $name): DataObject {
		$this->name = $name;
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
     * @return DataObject
     */
	public function withUserId(?string $userId): DataObject {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null File access permission */
	public function getScope(): ?string {
		return $this->scope;
	}
    /** @param string|null $scope File access permission */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}
    /**
     * @param string|null $scope File access permission
     * @return DataObject
     */
	public function withScope(?string $scope): DataObject {
		$this->scope = $scope;
		return $this;
	}
    /** @return array|null List of user IDs to be published */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
    /** @param array|null $allowUserIds List of user IDs to be published */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
    /**
     * @param array|null $allowUserIds List of user IDs to be published
     * @return DataObject
     */
	public function withAllowUserIds(?array $allowUserIds): DataObject {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return DataObject
     */
	public function withStatus(?string $status): DataObject {
		$this->status = $status;
		return $this;
	}
    /** @return string|null Data Generation */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Data Generation */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Data Generation
     * @return DataObject
     */
	public function withGeneration(?string $generation): DataObject {
		$this->generation = $generation;
		return $this;
	}
    /** @return string|null Generation of previously valid data */
	public function getPreviousGeneration(): ?string {
		return $this->previousGeneration;
	}
    /** @param string|null $previousGeneration Generation of previously valid data */
	public function setPreviousGeneration(?string $previousGeneration) {
		$this->previousGeneration = $previousGeneration;
	}
    /**
     * @param string|null $previousGeneration Generation of previously valid data
     * @return DataObject
     */
	public function withPreviousGeneration(?string $previousGeneration): DataObject {
		$this->previousGeneration = $previousGeneration;
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
     * @return DataObject
     */
	public function withCreatedAt(?int $createdAt): DataObject {
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
     * @return DataObject
     */
	public function withUpdatedAt(?int $updatedAt): DataObject {
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
     * @return DataObject
     */
	public function withRevision(?int $revision): DataObject {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DataObject {
        if ($data === null) {
            return null;
        }
        return (new DataObject())
            ->withDataObjectId(array_key_exists('dataObjectId', $data) && $data['dataObjectId'] !== null ? $data['dataObjectId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScope(array_key_exists('scope', $data) && $data['scope'] !== null ? $data['scope'] : null)
            ->withAllowUserIds(!array_key_exists('allowUserIds', $data) || $data['allowUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowUserIds']
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withPreviousGeneration(array_key_exists('previousGeneration', $data) && $data['previousGeneration'] !== null ? $data['previousGeneration'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dataObjectId" => $this->getDataObjectId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "scope" => $this->getScope(),
            "allowUserIds" => $this->getAllowUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds()
            ),
            "status" => $this->getStatus(),
            "generation" => $this->getGeneration(),
            "previousGeneration" => $this->getPreviousGeneration(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}