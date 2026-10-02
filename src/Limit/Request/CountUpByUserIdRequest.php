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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for countUpByUserId: Count-up by User ID
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#countupbyuserid
 */
class CountUpByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Usage Limit Model Name */
    private $limitName;
    /** @var string Counter Name */
    private $counterName;
    /** @var string User ID */
    private $userId;
    /** @var int Amount to count up */
    private $countUpValue;
    /** @var int Maximum value allowed to count up */
    private $maxValue;
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
     * @return CountUpByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CountUpByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Usage Limit Model Name */
	public function getLimitName(): ?string {
		return $this->limitName;
	}
    /** @param string|null $limitName Usage Limit Model Name */
	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}
    /**
     * @param string|null $limitName Usage Limit Model Name
     * @return CountUpByUserIdRequest
     */
	public function withLimitName(?string $limitName): CountUpByUserIdRequest {
		$this->limitName = $limitName;
		return $this;
	}
    /** @return string|null Counter Name */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /** @param string|null $counterName Counter Name */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Name
     * @return CountUpByUserIdRequest
     */
	public function withCounterName(?string $counterName): CountUpByUserIdRequest {
		$this->counterName = $counterName;
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
     * @return CountUpByUserIdRequest
     */
	public function withUserId(?string $userId): CountUpByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Amount to count up */
	public function getCountUpValue(): ?int {
		return $this->countUpValue;
	}
    /** @param int|null $countUpValue Amount to count up */
	public function setCountUpValue(?int $countUpValue) {
		$this->countUpValue = $countUpValue;
	}
    /**
     * @param int|null $countUpValue Amount to count up
     * @return CountUpByUserIdRequest
     */
	public function withCountUpValue(?int $countUpValue): CountUpByUserIdRequest {
		$this->countUpValue = $countUpValue;
		return $this;
	}
    /** @return int|null Maximum value allowed to count up */
	public function getMaxValue(): ?int {
		return $this->maxValue;
	}
    /** @param int|null $maxValue Maximum value allowed to count up */
	public function setMaxValue(?int $maxValue) {
		$this->maxValue = $maxValue;
	}
    /**
     * @param int|null $maxValue Maximum value allowed to count up
     * @return CountUpByUserIdRequest
     */
	public function withMaxValue(?int $maxValue): CountUpByUserIdRequest {
		$this->maxValue = $maxValue;
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
     * @return CountUpByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CountUpByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CountUpByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CountUpByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CountUpByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withLimitName(array_key_exists('limitName', $data) && $data['limitName'] !== null ? $data['limitName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCountUpValue(array_key_exists('countUpValue', $data) && $data['countUpValue'] !== null ? $data['countUpValue'] : null)
            ->withMaxValue(array_key_exists('maxValue', $data) && $data['maxValue'] !== null ? $data['maxValue'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "limitName" => $this->getLimitName(),
            "counterName" => $this->getCounterName(),
            "userId" => $this->getUserId(),
            "countUpValue" => $this->getCountUpValue(),
            "maxValue" => $this->getMaxValue(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}