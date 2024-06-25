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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class WalletSummary implements IModel {
	/**
     * @var int
	 */
	private $paid;
	/**
     * @var int
	 */
	private $free;
	/**
     * @var int
	 */
	private $total;
	public function getPaid(): ?int {
		return $this->paid;
	}
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}
	public function withPaid(?int $paid): WalletSummary {
		$this->paid = $paid;
		return $this;
	}
	public function getFree(): ?int {
		return $this->free;
	}
	public function setFree(?int $free) {
		$this->free = $free;
	}
	public function withFree(?int $free): WalletSummary {
		$this->free = $free;
		return $this;
	}
	public function getTotal(): ?int {
		return $this->total;
	}
	public function setTotal(?int $total) {
		$this->total = $total;
	}
	public function withTotal(?int $total): WalletSummary {
		$this->total = $total;
		return $this;
	}

    public static function fromJson(?array $data): ?WalletSummary {
        if ($data === null) {
            return null;
        }
        return (new WalletSummary())
            ->withPaid(array_key_exists('paid', $data) && $data['paid'] !== null ? $data['paid'] : null)
            ->withFree(array_key_exists('free', $data) && $data['free'] !== null ? $data['free'] : null)
            ->withTotal(array_key_exists('total', $data) && $data['total'] !== null ? $data['total'] : null);
    }

    public function toJson(): array {
        return array(
            "paid" => $this->getPaid(),
            "free" => $this->getFree(),
            "total" => $this->getTotal(),
        );
    }
}