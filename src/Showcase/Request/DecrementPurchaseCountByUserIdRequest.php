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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for decrementPurchaseCountByUserId: Decrement the number of times a Random Displayed Item has been purchased by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#decrementpurchasecountbyuserid
 */
class DecrementPurchaseCountByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Random Showcase Name */
    private $showcaseName;
    /** @var string Number of Random Displayed Item purchases name */
    private $displayItemName;
    /** @var string User ID */
    private $userId;
    /** @var int Number of purchase times to subtract */
    private $count;
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
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DecrementPurchaseCountByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Random Showcase Name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase Name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase Name
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withShowcaseName(?string $showcaseName): DecrementPurchaseCountByUserIdRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Number of Random Displayed Item purchases name */
	public function getDisplayItemName(): ?string {
		return $this->displayItemName;
	}
    /** @param string|null $displayItemName Number of Random Displayed Item purchases name */
	public function setDisplayItemName(?string $displayItemName) {
		$this->displayItemName = $displayItemName;
	}
    /**
     * @param string|null $displayItemName Number of Random Displayed Item purchases name
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withDisplayItemName(?string $displayItemName): DecrementPurchaseCountByUserIdRequest {
		$this->displayItemName = $displayItemName;
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
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withUserId(?string $userId): DecrementPurchaseCountByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Number of purchase times to subtract */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of purchase times to subtract */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of purchase times to subtract
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withCount(?int $count): DecrementPurchaseCountByUserIdRequest {
		$this->count = $count;
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
     * @return DecrementPurchaseCountByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DecrementPurchaseCountByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DecrementPurchaseCountByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DecrementPurchaseCountByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DecrementPurchaseCountByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemName(array_key_exists('displayItemName', $data) && $data['displayItemName'] !== null ? $data['displayItemName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemName" => $this->getDisplayItemName(),
            "userId" => $this->getUserId(),
            "count" => $this->getCount(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}