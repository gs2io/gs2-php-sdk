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
 * Request for buy: Buy Sales Item
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#buy
 */
class BuyRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Showcase name */
    private $showcaseName;
    /** @var string Displayed Item ID */
    private $displayItemId;
    /** @var string User ID */
    private $accessToken;
    /** @var int Purchase quantity */
    private $quantity;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return BuyRequest
     */
	public function withNamespaceName(?string $namespaceName): BuyRequest {
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
     * @return BuyRequest
     */
	public function withShowcaseName(?string $showcaseName): BuyRequest {
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
     * @return BuyRequest
     */
	public function withDisplayItemId(?string $displayItemId): BuyRequest {
		$this->displayItemId = $displayItemId;
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
     * @return BuyRequest
     */
	public function withAccessToken(?string $accessToken): BuyRequest {
		$this->accessToken = $accessToken;
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
     * @return BuyRequest
     */
	public function withQuantity(?int $quantity): BuyRequest {
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
     * @return BuyRequest
     */
	public function withConfig(?array $config): BuyRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BuyRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BuyRequest {
        if ($data === null) {
            return null;
        }
        return (new BuyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemId(array_key_exists('displayItemId', $data) && $data['displayItemId'] !== null ? $data['displayItemId'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withQuantity(array_key_exists('quantity', $data) && $data['quantity'] !== null ? $data['quantity'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemId" => $this->getDisplayItemId(),
            "accessToken" => $this->getAccessToken(),
            "quantity" => $this->getQuantity(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}