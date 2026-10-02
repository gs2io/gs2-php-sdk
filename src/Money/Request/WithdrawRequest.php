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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for withdraw: Consume balance from wallet
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#withdraw
 */
class WithdrawRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Slot Number */
    private $slot;
    /** @var int Quantity of premium currency to be consumed */
    private $count;
    /** @var bool Whether to target only paid currency */
    private $paidOnly;
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
     * @return WithdrawRequest
     */
	public function withNamespaceName(?string $namespaceName): WithdrawRequest {
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
     * @return WithdrawRequest
     */
	public function withAccessToken(?string $accessToken): WithdrawRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getSlot(): ?int {
		return $this->slot;
	}
    /** @param int|null $slot Slot Number */
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
    /**
     * @param int|null $slot Slot Number
     * @return WithdrawRequest
     */
	public function withSlot(?int $slot): WithdrawRequest {
		$this->slot = $slot;
		return $this;
	}
    /** @return int|null Quantity of premium currency to be consumed */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Quantity of premium currency to be consumed */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Quantity of premium currency to be consumed
     * @return WithdrawRequest
     */
	public function withCount(?int $count): WithdrawRequest {
		$this->count = $count;
		return $this;
	}
    /** @return bool|null Whether to target only paid currency */
	public function getPaidOnly(): ?bool {
		return $this->paidOnly;
	}
    /** @param bool|null $paidOnly Whether to target only paid currency */
	public function setPaidOnly(?bool $paidOnly) {
		$this->paidOnly = $paidOnly;
	}
    /**
     * @param bool|null $paidOnly Whether to target only paid currency
     * @return WithdrawRequest
     */
	public function withPaidOnly(?bool $paidOnly): WithdrawRequest {
		$this->paidOnly = $paidOnly;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): WithdrawRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawRequest {
        if ($data === null) {
            return null;
        }
        return (new WithdrawRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withPaidOnly(array_key_exists('paidOnly', $data) ? $data['paidOnly'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "slot" => $this->getSlot(),
            "count" => $this->getCount(),
            "paidOnly" => $this->getPaidOnly(),
        );
    }
}