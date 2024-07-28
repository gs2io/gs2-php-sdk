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

class DecreaseMaximumIdleMinutesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $categoryName;
    /** @var int */
    private $decreaseMinutes;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DecreaseMaximumIdleMinutesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): DecreaseMaximumIdleMinutesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): DecreaseMaximumIdleMinutesRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
	public function getDecreaseMinutes(): ?int {
		return $this->decreaseMinutes;
	}
	public function setDecreaseMinutes(?int $decreaseMinutes) {
		$this->decreaseMinutes = $decreaseMinutes;
	}
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