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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for allocateSubscriptionStatus: Allocate subscription status from receipt
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#allocatesubscriptionstatus
 */
class AllocateSubscriptionStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Receipt */
    private $receipt;
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
     * @return AllocateSubscriptionStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): AllocateSubscriptionStatusRequest {
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
     * @return AllocateSubscriptionStatusRequest
     */
	public function withAccessToken(?string $accessToken): AllocateSubscriptionStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Receipt */
	public function getReceipt(): ?string {
		return $this->receipt;
	}
    /** @param string|null $receipt Receipt */
	public function setReceipt(?string $receipt) {
		$this->receipt = $receipt;
	}
    /**
     * @param string|null $receipt Receipt
     * @return AllocateSubscriptionStatusRequest
     */
	public function withReceipt(?string $receipt): AllocateSubscriptionStatusRequest {
		$this->receipt = $receipt;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AllocateSubscriptionStatusRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AllocateSubscriptionStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new AllocateSubscriptionStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withReceipt(array_key_exists('receipt', $data) && $data['receipt'] !== null ? $data['receipt'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "receipt" => $this->getReceipt(),
        );
    }
}