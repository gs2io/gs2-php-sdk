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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for decreaseMaxValue: Subtract the maximum value of stamina
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#decreasemaxvalue
 */
class DecreaseMaxValueRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Maximum amount of stamina to be decreased */
    private $decreaseValue;
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
     * @return DecreaseMaxValueRequest
     */
	public function withNamespaceName(?string $namespaceName): DecreaseMaxValueRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Stamina Model Name */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
    /** @param string|null $staminaName Stamina Model Name */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
    /**
     * @param string|null $staminaName Stamina Model Name
     * @return DecreaseMaxValueRequest
     */
	public function withStaminaName(?string $staminaName): DecreaseMaxValueRequest {
		$this->staminaName = $staminaName;
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
     * @return DecreaseMaxValueRequest
     */
	public function withAccessToken(?string $accessToken): DecreaseMaxValueRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Maximum amount of stamina to be decreased */
	public function getDecreaseValue(): ?int {
		return $this->decreaseValue;
	}
    /** @param int|null $decreaseValue Maximum amount of stamina to be decreased */
	public function setDecreaseValue(?int $decreaseValue) {
		$this->decreaseValue = $decreaseValue;
	}
    /**
     * @param int|null $decreaseValue Maximum amount of stamina to be decreased
     * @return DecreaseMaxValueRequest
     */
	public function withDecreaseValue(?int $decreaseValue): DecreaseMaxValueRequest {
		$this->decreaseValue = $decreaseValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecreaseMaxValueRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseMaxValueRequest {
        if ($data === null) {
            return null;
        }
        return (new DecreaseMaxValueRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withDecreaseValue(array_key_exists('decreaseValue', $data) && $data['decreaseValue'] !== null ? $data['decreaseValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "accessToken" => $this->getAccessToken(),
            "decreaseValue" => $this->getDecreaseValue(),
        );
    }
}