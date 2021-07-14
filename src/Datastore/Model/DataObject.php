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


class DataObject implements IModel {
	/**
     * @var string
	 */
	private $dataObjectId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $scope;
	/**
     * @var array
	 */
	private $allowUserIds;
	/**
     * @var string
	 */
	private $platform;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var string
	 */
	private $generation;
	/**
     * @var string
	 */
	private $previousGeneration;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getDataObjectId(): ?string {
		return $this->dataObjectId;
	}

	public function setDataObjectId(?string $dataObjectId) {
		$this->dataObjectId = $dataObjectId;
	}

	public function withDataObjectId(?string $dataObjectId): DataObject {
		$this->dataObjectId = $dataObjectId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): DataObject {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DataObject {
		$this->userId = $userId;
		return $this;
	}

	public function getScope(): ?string {
		return $this->scope;
	}

	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	public function withScope(?string $scope): DataObject {
		$this->scope = $scope;
		return $this;
	}

	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}

	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	public function withAllowUserIds(?array $allowUserIds): DataObject {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}

	public function getPlatform(): ?string {
		return $this->platform;
	}

	public function setPlatform(?string $platform) {
		$this->platform = $platform;
	}

	public function withPlatform(?string $platform): DataObject {
		$this->platform = $platform;
		return $this;
	}

	public function getStatus(): ?string {
		return $this->status;
	}

	public function setStatus(?string $status) {
		$this->status = $status;
	}

	public function withStatus(?string $status): DataObject {
		$this->status = $status;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): DataObject {
		$this->generation = $generation;
		return $this;
	}

	public function getPreviousGeneration(): ?string {
		return $this->previousGeneration;
	}

	public function setPreviousGeneration(?string $previousGeneration) {
		$this->previousGeneration = $previousGeneration;
	}

	public function withPreviousGeneration(?string $previousGeneration): DataObject {
		$this->previousGeneration = $previousGeneration;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): DataObject {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): DataObject {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DataObject {
        if ($data === null) {
            return null;
        }
        return (new DataObject())
            ->withDataObjectId(empty($data['dataObjectId']) ? null : $data['dataObjectId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withScope(empty($data['scope']) ? null : $data['scope'])
            ->withAllowUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('allowUserIds', $data) && $data['allowUserIds'] !== null ? $data['allowUserIds'] : []
            ))
            ->withPlatform(empty($data['platform']) ? null : $data['platform'])
            ->withStatus(empty($data['status']) ? null : $data['status'])
            ->withGeneration(empty($data['generation']) ? null : $data['generation'])
            ->withPreviousGeneration(empty($data['previousGeneration']) ? null : $data['previousGeneration'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "dataObjectId" => $this->getDataObjectId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "scope" => $this->getScope(),
            "allowUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds() !== null && $this->getAllowUserIds() !== null ? $this->getAllowUserIds() : []
            ),
            "platform" => $this->getPlatform(),
            "status" => $this->getStatus(),
            "generation" => $this->getGeneration(),
            "previousGeneration" => $this->getPreviousGeneration(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}