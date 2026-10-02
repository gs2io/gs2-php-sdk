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
use Gs2\Showcase\Model\Config;

/**
 * Request for buyByUserId: Buy Sales Item by User ID
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#buybyuserid
 */
class BuyByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Showcase name */
    private $showcaseName;
    /** @var string Displayed Item ID */
    private $displayItemId;
    /** @var string User ID */
    private $userId;
    /** @var int Purchase quantity */
    private $quantity;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return BuyByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): BuyByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Showcase name
     * @return BuyByUserIdRequest
     */
	public function withShowcaseName(?string $showcaseName): BuyByUserIdRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Displayed Item ID */
	public function getDisplayItemId(): ?string {
		return $this->displayItemId;
	}
    /** @param string|null $displayItemId Displayed Item ID */
	public function setDisplayItemId(?string $displayItemId) {
		$this->displayItemId = $displayItemId;
	}
    /**
     * @param string|null $displayItemId Displayed Item ID
     * @return BuyByUserIdRequest
     */
	public function withDisplayItemId(?string $displayItemId): BuyByUserIdRequest {
		$this->displayItemId = $displayItemId;
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
     * @return BuyByUserIdRequest
     */
	public function withUserId(?string $userId): BuyByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Purchase quantity */
	public function getQuantity(): ?int {
		return $this->quantity;
	}
    /** @param int|null $quantity Purchase quantity */
	public function setQuantity(?int $quantity) {
		$this->quantity = $quantity;
	}
    /**
     * @param int|null $quantity Purchase quantity
     * @return BuyByUserIdRequest
     */
	public function withQuantity(?int $quantity): BuyByUserIdRequest {
		$this->quantity = $quantity;
		return $this;
	}
    /** @return array|null Configuration values applied to transaction variables */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Configuration values applied to transaction variables */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Configuration values applied to transaction variables
     * @return BuyByUserIdRequest
     */
	public function withConfig(?array $config): BuyByUserIdRequest {
		$this->config = $config;
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
     * @return BuyByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): BuyByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BuyByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BuyByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new BuyByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemId(array_key_exists('displayItemId', $data) && $data['displayItemId'] !== null ? $data['displayItemId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withQuantity(array_key_exists('quantity', $data) && $data['quantity'] !== null ? $data['quantity'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemId" => $this->getDisplayItemId(),
            "userId" => $this->getUserId(),
            "quantity" => $this->getQuantity(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}