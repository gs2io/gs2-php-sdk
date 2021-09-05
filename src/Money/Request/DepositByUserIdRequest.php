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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DepositByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $slot;
    /** @var float */
    private $price;
    /** @var int */
    private $count;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DepositByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): DepositByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getSlot(): ?int {
		return $this->slot;
	}

	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	public function withSlot(?int $slot): DepositByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}

	public function getPrice(): ?float {
		return $this->price;
	}

	public function setPrice(?float $price) {
		$this->price = $price;
	}

	public function withPrice(?float $price): DepositByUserIdRequest {
		$this->price = $price;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): DepositByUserIdRequest {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?DepositByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DepositByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withSlot(empty($data['slot']) && $data['slot'] !== 0 ? null : $data['slot'])
            ->withPrice(empty($data['price']) && $data['price'] !== 0 ? null : $data['price'])
            ->withCount(empty($data['count']) && $data['count'] !== 0 ? null : $data['count']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "price" => $this->getPrice(),
            "count" => $this->getCount(),
        );
    }
}