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


/**
 * Unused Balance
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#unusedbalance
 */
class UnusedBalance implements IModel {
	/**
     * @var string Unused Balance GRN
	 */
	private $unusedBalanceId;
	/**
     * @var string Currency Code
	 */
	private $currency;
	/**
     * @var float Unused balance
	 */
	private $balance;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Unused Balance GRN */
	public function getUnusedBalanceId(): ?string {
		return $this->unusedBalanceId;
	}
    /** @param string|null $unusedBalanceId Unused Balance GRN */
	public function setUnusedBalanceId(?string $unusedBalanceId) {
		$this->unusedBalanceId = $unusedBalanceId;
	}
    /**
     * @param string|null $unusedBalanceId Unused Balance GRN
     * @return UnusedBalance
     */
	public function withUnusedBalanceId(?string $unusedBalanceId): UnusedBalance {
		$this->unusedBalanceId = $unusedBalanceId;
		return $this;
	}
    /** @return string|null Currency Code */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Currency Code */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Currency Code
     * @return UnusedBalance
     */
	public function withCurrency(?string $currency): UnusedBalance {
		$this->currency = $currency;
		return $this;
	}
    /** @return float|null Unused balance */
	public function getBalance(): ?float {
		return $this->balance;
	}
    /** @param float|null $balance Unused balance */
	public function setBalance(?float $balance) {
		$this->balance = $balance;
	}
    /**
     * @param float|null $balance Unused balance
     * @return UnusedBalance
     */
	public function withBalance(?float $balance): UnusedBalance {
		$this->balance = $balance;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return UnusedBalance
     */
	public function withUpdatedAt(?int $updatedAt): UnusedBalance {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return UnusedBalance
     */
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