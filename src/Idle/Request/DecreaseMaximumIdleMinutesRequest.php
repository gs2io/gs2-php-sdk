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

namespace Gs2\Idle\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for decreaseMaximumIdleMinutes: Decrease the maximum idle time
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#decreasemaximumidleminutes
 */
class DecreaseMaximumIdleMinutesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Category Model Name */
    private $categoryName;
    /** @var int Minutes to decrease the maximum idle time */
    private $decreaseMinutes;
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
     * @return DecreaseMaximumIdleMinutesRequest
     */
	public function withNamespaceName(?string $namespaceName): DecreaseMaximumIdleMinutesRequest {
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
     * @return DecreaseMaximumIdleMinutesRequest
     */
	public function withAccessToken(?string $accessToken): DecreaseMaximumIdleMinutesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Category Model Name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Model Name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Model Name
     * @return DecreaseMaximumIdleMinutesRequest
     */
	public function withCategoryName(?string $categoryName): DecreaseMaximumIdleMinutesRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
    /** @return int|null Minutes to decrease the maximum idle time */
	public function getDecreaseMinutes(): ?int {
		return $this->decreaseMinutes;
	}
    /** @param int|null $decreaseMinutes Minutes to decrease the maximum idle time */
	public function setDecreaseMinutes(?int $decreaseMinutes) {
		$this->decreaseMinutes = $decreaseMinutes;
	}
    /**
     * @param int|null $decreaseMinutes Minutes to decrease the maximum idle time
     * @return DecreaseMaximumIdleMinutesRequest
     */
	public function withDecreaseMinutes(?int $decreaseMinutes): DecreaseMaximumIdleMinutesRequest {
		$this->decreaseMinutes = $decreaseMinutes;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecreaseMaximumIdleMinutesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseMaximumIdleMinutesRequest {
        if ($data === null) {
            return null;
        }
        return (new DecreaseMaximumIdleMinutesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withDecreaseMinutes(array_key_exists('decreaseMinutes', $data) && $data['decreaseMinutes'] !== null ? $data['decreaseMinutes'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "categoryName" => $this->getCategoryName(),
            "decreaseMinutes" => $this->getDecreaseMinutes(),
        );
    }
}