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
 * Request for getWallet: Get Wallet
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#getwallet
 */
class GetWalletRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Slot Number */
    private $slot;
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
     * @return GetWalletRequest
     */
	public function withNamespaceName(?string $namespaceName): GetWalletRequest {
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
     * @return GetWalletRequest
     */
	public function withAccessToken(?string $accessToken): GetWalletRequest {
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
     * @return GetWalletRequest
     */
	public function withSlot(?int $slot): GetWalletRequest {
		$this->slot = $slot;
		return $this;
	}

    public static function fromJson(?array $data): ?GetWalletRequest {
        if ($data === null) {
            return null;
        }
        return (new GetWalletRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "slot" => $this->getSlot(),
        );
    }
}