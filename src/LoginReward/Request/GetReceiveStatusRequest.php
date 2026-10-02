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

namespace Gs2\LoginReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getReceiveStatus: Get Receive Status
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#getreceivestatus
 */
class GetReceiveStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Bonus Model Name */
    private $bonusModelName;
    /** @var string User ID */
    private $accessToken;
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
     * @return GetReceiveStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): GetReceiveStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Bonus Model Name */
	public function getBonusModelName(): ?string {
		return $this->bonusModelName;
	}
    /** @param string|null $bonusModelName Bonus Model Name */
	public function setBonusModelName(?string $bonusModelName) {
		$this->bonusModelName = $bonusModelName;
	}
    /**
     * @param string|null $bonusModelName Bonus Model Name
     * @return GetReceiveStatusRequest
     */
	public function withBonusModelName(?string $bonusModelName): GetReceiveStatusRequest {
		$this->bonusModelName = $bonusModelName;
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
     * @return GetReceiveStatusRequest
     */
	public function withAccessToken(?string $accessToken): GetReceiveStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetReceiveStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new GetReceiveStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBonusModelName(array_key_exists('bonusModelName', $data) && $data['bonusModelName'] !== null ? $data['bonusModelName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "bonusModelName" => $this->getBonusModelName(),
            "accessToken" => $this->getAccessToken(),
        );
    }
}