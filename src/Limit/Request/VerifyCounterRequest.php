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
 * Request for verifyCounter: Verify Counter value
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#verifycounter
 */
class VerifyCounterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Usage Limit Model Name */
    private $limitName;
    /** @var string Counter Name */
    private $counterName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Count Value */
    private $count;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
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
     * @return VerifyCounterRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCounterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyCounterRequest
     */
	public function withAccessToken(?string $accessToken): VerifyCounterRequest {
		$this->accessToken = $accessToken;
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
     * @return VerifyCounterRequest
     */
	public function withLimitName(?string $limitName): VerifyCounterRequest {
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
     * @return VerifyCounterRequest
     */
	public function withCounterName(?string $counterName): VerifyCounterRequest {
		$this->counterName = $counterName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyCounterRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCounterRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Count Value */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count Value */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count Value
     * @return VerifyCounterRequest
     */
	public function withCount(?int $count): VerifyCounterRequest {
		$this->count = $count;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return VerifyCounterRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCounterRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCounterRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCounterRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCounterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withLimitName(array_key_exists('limitName', $data) && $data['limitName'] !== null ? $data['limitName'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "limitName" => $this->getLimitName(),
            "counterName" => $this->getCounterName(),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}