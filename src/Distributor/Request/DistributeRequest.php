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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\DistributeResource;

/**
 * Request for distribute: Distribution of possessions
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#distribute
 */
class DistributeRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Distributor Model name */
    private $distributorName;
    /** @var string User ID */
    private $userId;
    /** @var DistributeResource Resources to be added */
    private $distributeResource;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return DistributeRequest
     */
	public function withNamespaceName(?string $namespaceName): DistributeRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Distributor Model name */
	public function getDistributorName(): ?string {
		return $this->distributorName;
	}
    /** @param string|null $distributorName Distributor Model name */
	public function setDistributorName(?string $distributorName) {
		$this->distributorName = $distributorName;
	}
    /**
     * @param string|null $distributorName Distributor Model name
     * @return DistributeRequest
     */
	public function withDistributorName(?string $distributorName): DistributeRequest {
		$this->distributorName = $distributorName;
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
     * @return DistributeRequest
     */
	public function withUserId(?string $userId): DistributeRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return DistributeResource|null Resources to be added */
	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}
    /** @param DistributeResource|null $distributeResource Resources to be added */
	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}
    /**
     * @param DistributeResource|null $distributeResource Resources to be added
     * @return DistributeRequest
     */
	public function withDistributeResource(?DistributeResource $distributeResource): DistributeRequest {
		$this->distributeResource = $distributeResource;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DistributeRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DistributeRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DistributeRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeRequest {
        if ($data === null) {
            return null;
        }
        return (new DistributeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDistributorName(array_key_exists('distributorName', $data) && $data['distributorName'] !== null ? $data['distributorName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDistributeResource(array_key_exists('distributeResource', $data) && $data['distributeResource'] !== null ? DistributeResource::fromJson($data['distributeResource']) : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "distributorName" => $this->getDistributorName(),
            "userId" => $this->getUserId(),
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}