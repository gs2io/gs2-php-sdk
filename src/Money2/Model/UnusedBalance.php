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


class UnusedBalance implements IModel {
	/**
     * @var string
	 */
	private $unusedBalanceId;
	/**
     * @var string
	 */
	private $currency;
	/**
     * @var float
	 */
	private $balance;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getUnusedBalanceId(): ?string {
		return $this->unusedBalanceId;
	}
	public function setUnusedBalanceId(?string $unusedBalanceId) {
		$this->unusedBalanceId = $unusedBalanceId;
	}
	public function withUnusedBalanceId(?string $unusedBalanceId): UnusedBalance {
		$this->unusedBalanceId = $unusedBalanceId;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): UnusedBalance {
		$this->currency = $currency;
		return $this;
	}
	public function getBalance(): ?float {
		return $this->balance;
	}
	public function setBalance(?float $balance) {
		$this->balance = $balance;
	}
	public function withBalance(?float $balance): UnusedBalance {
		$this->balance = $balance;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): UnusedBalance {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): UnusedBalance {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?UnusedBalance {
        if ($data === null) {
            return null;
        }
        return (new UnusedBalance())
            ->withUnusedBalanceId(array_key_exists('unusedBalanceId', $data) && $data['unusedBalanceId'] !== null ? $data['unusedBalanceId'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withBalance(array_key_exists('balance', $data) && $data['balance'] !== null ? $data['balance'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "unusedBalanceId" => $this->getUnusedBalanceId(),
            "currency" => $this->getCurrency(),
            "balance" => $this->getBalance(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}