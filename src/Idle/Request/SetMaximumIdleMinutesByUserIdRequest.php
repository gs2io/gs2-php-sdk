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
 * Request for setMaximumIdleMinutesByUserId: Set the maximum idle time by User ID
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#setmaximumidleminutesbyuserid
 */
class SetMaximumIdleMinutesByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Category Model Name */
    private $categoryName;
    /** @var int Maximum idle time to set (Minutes) */
    private $maximumIdleMinutes;
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
     * @return SetMaximumIdleMinutesByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): SetMaximumIdleMinutesByUserIdRequest {
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
     * @return SetMaximumIdleMinutesByUserIdRequest
     */
	public function withUserId(?string $userId): SetMaximumIdleMinutesByUserIdRequest {
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
     * @return SetMaximumIdleMinutesByUserIdRequest
     */
	public function withCategoryName(?string $categoryName): SetMaximumIdleMinutesByUserIdRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
    /** @return int|null Maximum idle time to set (Minutes) */
	public function getMaximumIdleMinutes(): ?int {
		return $this->maximumIdleMinutes;
	}
    /** @param int|null $maximumIdleMinutes Maximum idle time to set (Minutes) */
	public function setMaximumIdleMinutes(?int $maximumIdleMinutes) {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
	}
    /**
     * @param int|null $maximumIdleMinutes Maximum idle time to set (Minutes)
     * @return SetMaximumIdleMinutesByUserIdRequest
     */
	public function withMaximumIdleMinutes(?int $maximumIdleMinutes): SetMaximumIdleMinutesByUserIdRequest {
		$this->maximumIdleMinutes = $maximumIdleMinutes;
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
     * @return SetMaximumIdleMinutesByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): SetMaximumIdleMinutesByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetMaximumIdleMinutesByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetMaximumIdleMinutesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetMaximumIdleMinutesByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withMaximumIdleMinutes(array_key_exists('maximumIdleMinutes', $data) && $data['maximumIdleMinutes'] !== null ? $data['maximumIdleMinutes'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "categoryName" => $this->getCategoryName(),
            "maximumIdleMinutes" => $this->getMaximumIdleMinutes(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}