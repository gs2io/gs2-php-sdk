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

namespace Gs2\Enchant\Model;

use Gs2\Core\Model\IModel;


class RarityParameterStatus implements IModel {
	/**
     * @var string
	 */
	private $rarityParameterStatusId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $parameterName;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var array
	 */
	private $parameterValues;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getRarityParameterStatusId(): ?string {
		return $this->rarityParameterStatusId;
	}
	public function setRarityParameterStatusId(?string $rarityParameterStatusId) {
		$this->rarityParameterStatusId = $rarityParameterStatusId;
	}
	public function withRarityParameterStatusId(?string $rarityParameterStatusId): RarityParameterStatus {
		$this->rarityParameterStatusId = $rarityParameterStatusId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): RarityParameterStatus {
		$this->userId = $userId;
		return $this;
	}
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
	public function withParameterName(?string $parameterName): RarityParameterStatus {
		$this->parameterName = $parameterName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): RarityParameterStatus {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getParameterValues(): ?array {
		return $this->parameterValues;
	}
	public function setParameterValues(?array $parameterValues) {
		$this->parameterValues = $parameterValues;
	}
	public function withParameterValues(?array $parameterValues): RarityParameterStatus {
		$this->parameterValues = $parameterValues;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): RarityParameterStatus {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): RarityParameterStatus {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?RarityParameterStatus {
        if ($data === null) {
            return null;
        }
        return (new RarityParameterStatus())
            ->withRarityParameterStatusId(array_key_exists('rarityParameterStatusId', $data) && $data['rarityParameterStatusId'] !== null ? $data['rarityParameterStatusId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withParameterValues(array_map(
                function ($item) {
                    return RarityParameterValue::fromJson($item);
                },
                array_key_exists('parameterValues', $data) && $data['parameterValues'] !== null ? $data['parameterValues'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "rarityParameterStatusId" => $this->getRarityParameterStatusId(),
            "userId" => $this->getUserId(),
            "parameterName" => $this->getParameterName(),
            "propertyId" => $this->getPropertyId(),
            "parameterValues" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameterValues() !== null && $this->getParameterValues() !== null ? $this->getParameterValues() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}