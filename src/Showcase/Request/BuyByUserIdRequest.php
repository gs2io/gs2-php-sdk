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

class BuyByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $showcaseName;
    /** @var string */
    private $displayItemId;
    /** @var string */
    private $userId;
    /** @var int */
    private $quantity;
    /** @var array */
    private $config;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): BuyByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getShowcaseName(): ?string {
		return $this->showcaseName;
	}
	public function setShowcaseName(?string $showcaseName) {
		$this->showcaseName = $showcaseName;
	}
	public function withShowcaseName(?string $showcaseName): BuyByUserIdRequest {
		$this->showcaseName = $showcaseName;
		return $this;
	}
	public function getDisplayItemId(): ?string {
		return $this->displayItemId;
	}
	public function setDisplayItemId(?string $displayItemId) {
		$this->displayItemId = $displayItemId;
	}
	public function withDisplayItemId(?string $displayItemId): BuyByUserIdRequest {
		$this->displayItemId = $displayItemId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): BuyByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getQuantity(): ?int {
		return $this->quantity;
	}
	public function setQuantity(?int $quantity) {
		$this->quantity = $quantity;
	}
	public function withQuantity(?int $quantity): BuyByUserIdRequest {
		$this->quantity = $quantity;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): BuyByUserIdRequest {
		$this->config = $config;
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
            ->withConfig(array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "showcaseName" => $this->getShowcaseName(),
            "displayItemId" => $this->getDisplayItemId(),
            "userId" => $this->getUserId(),
            "quantity" => $this->getQuantity(),
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}