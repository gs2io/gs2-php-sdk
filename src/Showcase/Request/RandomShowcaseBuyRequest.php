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
 * Request for randomShowcaseBuy: Purchase Random Displayed Item from Random Showcase
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#randomshowcasebuy
 */
class RandomShowcaseBuyRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Random Showcase name */
    private $showcaseName;
    /** @var string Random Displayed Item name */
    private $displayItemName;
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
     * @return RandomShowcaseBuyRequest
     */
	public function withNamespaceName(?string $namespaceName): RandomShowcaseBuyRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Random Showcase name */
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
    /** @param string|null $showcaseName Random Showcase name */
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
    /**
     * @param string|null $showcaseName Random Showcase name
     * @return RandomShowcaseBuyRequest
     */
	public function withShowcaseName(?string $showcaseName): RandomShowcaseBuyRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
    /** @return string|null Random Displayed Item name */
	public function getDisplayItemName(): ?string {
		return $this->displayItemName;
	}
    /** @param string|null $displayItemName Random Displayed Item name */
	public function setDisplayItemName(?string $displayItemName) {
		$this->displayItemName = $displayItemName;
	}
    /**
     * @param string|null $displayItemName Random Displayed Item name
     * @return RandomShowcaseBuyRequest
     */
	public function withDisplayItemName(?string $displayItemName): RandomShowcaseBuyRequest {
		$this->displayItemName = $displayItemName;
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
     * @return RandomShowcaseBuyRequest
     */
	public function withAccessToken(?string $accessToken): RandomShowcaseBuyRequest {
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
     * @return RandomShowcaseBuyRequest
     */
	public function withQuantity(?int $quantity): RandomShowcaseBuyRequest {
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
     * @return RandomShowcaseBuyRequest
     */
	public function withConfig(?array $config): RandomShowcaseBuyRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RandomShowcaseBuyRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RandomShowcaseBuyRequest {
        if ($data === null) {
            return null;
        }
        return (new RandomShowcaseBuyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withShowcaseName(array_key_exists('showcaseName', $data) && $data['showcaseName'] !== null ? $data['showcaseName'] : null)
            ->withDisplayItemName(array_key_exists('displayItemName', $data) && $data['displayItemName'] !== null ? $data['displayItemName'] : null)
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
            "displayItemName" => $this->getDisplayItemName(),
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