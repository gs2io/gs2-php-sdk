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
 * Request for decreaseMaximumIdleMinutesByUserId: Decrease the maximum idle time by User ID
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#decreasemaximumidleminutesbyuserid
 */
class DecreaseMaximumIdleMinutesByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Category Model Name */
    private $categoryName;
    /** @var int Minutes to decrease the maximum idle time */
    private $decreaseMinutes;
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
     * @return DecreaseMaximumIdleMinutesByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DecreaseMaximumIdleMinutesByUserIdRequest {
		$this->namespaceName = $namespaceName;
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
     * @return DecreaseMaximumIdleMinutesByUserIdRequest
     */
	public function withUserId(?string $userId): DecreaseMaximumIdleMinutesByUserIdRequest {
		$this->userId = $userId;
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
     * @return DecreaseMaximumIdleMinutesByUserIdRequest
     */
	public function withCategoryName(?string $categoryName): DecreaseMaximumIdleMinutesByUserIdRequest {
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
     * @return DecreaseMaximumIdleMinutesByUserIdRequest
     */
	public function withDecreaseMinutes(?int $decreaseMinutes): DecreaseMaximumIdleMinutesByUserIdRequest {
		$this->decreaseMinutes = $decreaseMinutes;
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
     * @return DecreaseMaximumIdleMinutesByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DecreaseMaximumIdleMinutesByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecreaseMaximumIdleMinutesByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecreaseMaximumIdleMinutesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DecreaseMaximumIdleMinutesByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withDecreaseMinutes(array_key_exists('decreaseMinutes', $data) && $data['decreaseMinutes'] !== null ? $data['decreaseMinutes'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "categoryName" => $this->getCategoryName(),
            "decreaseMinutes" => $this->getDecreaseMinutes(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}