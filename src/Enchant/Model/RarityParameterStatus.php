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


/**
 * Rarity Parameter Status
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#rarityparameterstatus
 */
class RarityParameterStatus implements IModel {
	/**
     * @var string Rarity Parameter Status GRN
	 */
	private $rarityParameterStatusId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Rarity Parameter Model name
	 */
	private $parameterName;
	/**
     * @var string Property ID of the resource that owns the parameter
	 */
	private $propertyId;
	/**
     * @var array List of rarity parameter values
	 */
	private $parameterValues;
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
    /** @return string|null Rarity Parameter Status GRN */
	public function getRarityParameterStatusId(): ?string {
		return $this->rarityParameterStatusId;
	}
    /** @param string|null $rarityParameterStatusId Rarity Parameter Status GRN */
	public function setRarityParameterStatusId(?string $rarityParameterStatusId) {
		$this->rarityParameterStatusId = $rarityParameterStatusId;
	}
    /**
     * @param string|null $rarityParameterStatusId Rarity Parameter Status GRN
     * @return RarityParameterStatus
     */
	public function withRarityParameterStatusId(?string $rarityParameterStatusId): RarityParameterStatus {
		$this->rarityParameterStatusId = $rarityParameterStatusId;
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
     * @return RarityParameterStatus
     */
	public function withUserId(?string $userId): RarityParameterStatus {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Rarity Parameter Model name */
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
    /** @param string|null $parameterName Rarity Parameter Model name */
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
    /**
     * @param string|null $parameterName Rarity Parameter Model name
     * @return RarityParameterStatus
     */
	public function withParameterName(?string $parameterName): RarityParameterStatus {
		$this->parameterName = $parameterName;
		return $this;
	}
    /** @return string|null Property ID of the resource that owns the parameter */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID of the resource that owns the parameter */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID of the resource that owns the parameter
     * @return RarityParameterStatus
     */
	public function withPropertyId(?string $propertyId): RarityParameterStatus {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of rarity parameter values */
	public function getParameterValues(): ?array {
		return $this->parameterValues;
	}
    /** @param array|null $parameterValues List of rarity parameter values */
	public function setParameterValues(?array $parameterValues) {
		$this->parameterValues = $parameterValues;
	}
    /**
     * @param array|null $parameterValues List of rarity parameter values
     * @return RarityParameterStatus
     */
	public function withParameterValues(?array $parameterValues): RarityParameterStatus {
		$this->parameterValues = $parameterValues;
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
     * @return RarityParameterStatus
     */
	public function withCreatedAt(?int $createdAt): RarityParameterStatus {
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
     * @return RarityParameterStatus
     */
	public function withUpdatedAt(?int $updatedAt): RarityParameterStatus {
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
     * @return RarityParameterStatus
     */
	public function withRevision(?int $revision): RarityParameterStatus {
		$this->revision = $revision;
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
            ->withParameterValues(!array_key_exists('parameterValues', $data) || $data['parameterValues'] === null ? null : array_map(
                function ($item) {
                    return RarityParameterValue::fromJson($item);
                },
                $data['parameterValues']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "rarityParameterStatusId" => $this->getRarityParameterStatusId(),
            "userId" => $this->getUserId(),
            "parameterName" => $this->getParameterName(),
            "propertyId" => $this->getPropertyId(),
            "parameterValues" => $this->getParameterValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameterValues()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}