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
 * Balance Parameter Status
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#balanceparameterstatus
 */
class BalanceParameterStatus implements IModel {
	/**
     * @var string Balance Parameter GRN
	 */
	private $balanceParameterStatusId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Balance Parameter Model name
	 */
	private $parameterName;
	/**
     * @var string Property ID of the resource that owns the parameter
	 */
	private $propertyId;
	/**
     * @var array List of balance parameter values
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
    /** @return string|null Balance Parameter GRN */
	public function getBalanceParameterStatusId(): ?string {
		return $this->balanceParameterStatusId;
	}
    /** @param string|null $balanceParameterStatusId Balance Parameter GRN */
	public function setBalanceParameterStatusId(?string $balanceParameterStatusId) {
		$this->balanceParameterStatusId = $balanceParameterStatusId;
	}
    /**
     * @param string|null $balanceParameterStatusId Balance Parameter GRN
     * @return BalanceParameterStatus
     */
	public function withBalanceParameterStatusId(?string $balanceParameterStatusId): BalanceParameterStatus {
		$this->balanceParameterStatusId = $balanceParameterStatusId;
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
     * @return BalanceParameterStatus
     */
	public function withUserId(?string $userId): BalanceParameterStatus {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Balance Parameter Model name */
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
    /** @param string|null $parameterName Balance Parameter Model name */
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
    /**
     * @param string|null $parameterName Balance Parameter Model name
     * @return BalanceParameterStatus
     */
	public function withParameterName(?string $parameterName): BalanceParameterStatus {
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
     * @return BalanceParameterStatus
     */
	public function withPropertyId(?string $propertyId): BalanceParameterStatus {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of balance parameter values */
	public function getParameterValues(): ?array {
		return $this->parameterValues;
	}
    /** @param array|null $parameterValues List of balance parameter values */
	public function setParameterValues(?array $parameterValues) {
		$this->parameterValues = $parameterValues;
	}
    /**
     * @param array|null $parameterValues List of balance parameter values
     * @return BalanceParameterStatus
     */
	public function withParameterValues(?array $parameterValues): BalanceParameterStatus {
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
     * @return BalanceParameterStatus
     */
	public function withCreatedAt(?int $createdAt): BalanceParameterStatus {
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
     * @return BalanceParameterStatus
     */
	public function withUpdatedAt(?int $updatedAt): BalanceParameterStatus {
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
     * @return BalanceParameterStatus
     */
	public function withRevision(?int $revision): BalanceParameterStatus {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?BalanceParameterStatus {
        if ($data === null) {
            return null;
        }
        return (new BalanceParameterStatus())
            ->withBalanceParameterStatusId(array_key_exists('balanceParameterStatusId', $data) && $data['balanceParameterStatusId'] !== null ? $data['balanceParameterStatusId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withParameterValues(!array_key_exists('parameterValues', $data) || $data['parameterValues'] === null ? null : array_map(
                function ($item) {
                    return BalanceParameterValue::fromJson($item);
                },
                $data['parameterValues']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "balanceParameterStatusId" => $this->getBalanceParameterStatusId(),
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