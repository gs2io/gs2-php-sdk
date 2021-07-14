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

namespace Gs2\Money\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money\Model\WalletDetail;
use Gs2\Money\Model\Wallet;

class WithdrawByStampTaskResult implements IResult {
    /** @var Wallet */
    private $item;
    /** @var float */
    private $price;
    /** @var string */
    private $newContextStack;

	public function getItem(): ?Wallet {
		return $this->item;
	}

	public function setItem(?Wallet $item) {
		$this->item = $item;
	}

	public function withItem(?Wallet $item): WithdrawByStampTaskResult {
		$this->item = $item;
		return $this;
	}

	public function getPrice(): ?float {
		return $this->price;
	}

	public function setPrice(?float $price) {
		$this->price = $price;
	}

	public function withPrice(?float $price): WithdrawByStampTaskResult {
		$this->price = $price;
		return $this;
	}

	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

	public function withNewContextStack(?string $newContextStack): WithdrawByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new WithdrawByStampTaskResult())
            ->withItem(empty($data['item']) ? null : Wallet::fromJson($data['item']))
            ->withPrice(empty($data['price']) ? null : $data['price'])
            ->withNewContextStack(empty($data['newContextStack']) ? null : $data['newContextStack']);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "price" => $this->getPrice(),
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}