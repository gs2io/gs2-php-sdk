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

namespace Gs2\Lottery\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lottery\Model\AcquireAction;
use Gs2\Lottery\Model\DrawnPrize;
use Gs2\Lottery\Model\BoxItem;
use Gs2\Lottery\Model\BoxItems;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of drawByStampSheet: Execute lottery processing as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/lottery/stamp_sheet/#gs2lotterydrawbyuserid
 */
class DrawByStampSheetResult implements IResult {
    /** @var array List of Prize emission */
    private $items;
    /** @var BoxItems List of items taken out of the box */
    private $boxItems;
    /** @var string Issued transaction ID */
    private $transactionId;
    /** @var string Stamp sheet to obtain emission prizes */
    private $stampSheet;
    /** @var string Cryptographic key GRN used for stamp sheet signature calculations */
    private $stampSheetEncryptionKeyId;
    /** @var bool Whether automatic transaction execution is enabled */
    private $autoRunStampSheet;
    /** @var bool Whether to commit the transaction atomically */
    private $atomicCommit;
    /** @var string Issued transaction */
    private $transaction;
    /** @var CoreTransactionResult Transaction Execution Result */
    private $transactionResult;

    /** @return array|null List of Prize emission */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Prize emission */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Prize emission
     * @return DrawByStampSheetResult
     */
	public function withItems(?array $items): DrawByStampSheetResult {
		$this->items = $items;
		return $this;
	}

    /** @return BoxItems|null List of items taken out of the box */
	public function getBoxItems(): ?BoxItems {
		return $this->boxItems;
	}

    /** @param BoxItems|null $boxItems List of items taken out of the box */
	public function setBoxItems(?BoxItems $boxItems) {
		$this->boxItems = $boxItems;
	}

    /**
     * @param BoxItems|null $boxItems List of items taken out of the box
     * @return DrawByStampSheetResult
     */
	public function withBoxItems(?BoxItems $boxItems): DrawByStampSheetResult {
		$this->boxItems = $boxItems;
		return $this;
	}

    /** @return string|null Issued transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

    /** @param string|null $transactionId Issued transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

    /**
     * @param string|null $transactionId Issued transaction ID
     * @return DrawByStampSheetResult
     */
	public function withTransactionId(?string $transactionId): DrawByStampSheetResult {
		$this->transactionId = $transactionId;
		return $this;
	}

    /** @return string|null Stamp sheet to obtain emission prizes */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

    /** @param string|null $stampSheet Stamp sheet to obtain emission prizes */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    /**
     * @param string|null $stampSheet Stamp sheet to obtain emission prizes
     * @return DrawByStampSheetResult
     */
	public function withStampSheet(?string $stampSheet): DrawByStampSheetResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

    /** @return string|null Cryptographic key GRN used for stamp sheet signature calculations */
	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

    /** @param string|null $stampSheetEncryptionKeyId Cryptographic key GRN used for stamp sheet signature calculations */
	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

    /**
     * @param string|null $stampSheetEncryptionKeyId Cryptographic key GRN used for stamp sheet signature calculations
     * @return DrawByStampSheetResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): DrawByStampSheetResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

    /** @return bool|null Whether automatic transaction execution is enabled */
	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

    /** @param bool|null $autoRunStampSheet Whether automatic transaction execution is enabled */
	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

    /**
     * @param bool|null $autoRunStampSheet Whether automatic transaction execution is enabled
     * @return DrawByStampSheetResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): DrawByStampSheetResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

    /** @return bool|null Whether to commit the transaction atomically */
	public function getAtomicCommit(): ?bool {
		return $this->atomicCommit;
	}

    /** @param bool|null $atomicCommit Whether to commit the transaction atomically */
	public function setAtomicCommit(?bool $atomicCommit) {
		$this->atomicCommit = $atomicCommit;
	}

    /**
     * @param bool|null $atomicCommit Whether to commit the transaction atomically
     * @return DrawByStampSheetResult
     */
	public function withAtomicCommit(?bool $atomicCommit): DrawByStampSheetResult {
		$this->atomicCommit = $atomicCommit;
		return $this;
	}

    /** @return string|null Issued transaction */
	public function getTransaction(): ?string {
		return $this->transaction;
	}

    /** @param string|null $transaction Issued transaction */
	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}

    /**
     * @param string|null $transaction Issued transaction
     * @return DrawByStampSheetResult
     */
	public function withTransaction(?string $transaction): DrawByStampSheetResult {
		$this->transaction = $transaction;
		return $this;
	}

    /** @return CoreTransactionResult|null Transaction Execution Result */
	public function getTransactionResult(): ?CoreTransactionResult {
		return $this->transactionResult;
	}

    /** @param CoreTransactionResult|null $transactionResult Transaction Execution Result */
	public function setTransactionResult(?CoreTransactionResult $transactionResult) {
		$this->transactionResult = $transactionResult;
	}

    /**
     * @param CoreTransactionResult|null $transactionResult Transaction Execution Result
     * @return DrawByStampSheetResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): DrawByStampSheetResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?DrawByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new DrawByStampSheetResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return DrawnPrize::fromJson($item);
                },
                $data['items']
            ))
            ->withBoxItems(array_key_exists('boxItems', $data) && $data['boxItems'] !== null ? BoxItems::fromJson($data['boxItems']) : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withStampSheetEncryptionKeyId(array_key_exists('stampSheetEncryptionKeyId', $data) && $data['stampSheetEncryptionKeyId'] !== null ? $data['stampSheetEncryptionKeyId'] : null)
            ->withAutoRunStampSheet(array_key_exists('autoRunStampSheet', $data) ? $data['autoRunStampSheet'] : null)
            ->withAtomicCommit(array_key_exists('atomicCommit', $data) ? $data['atomicCommit'] : null)
            ->withTransaction(array_key_exists('transaction', $data) && $data['transaction'] !== null ? $data['transaction'] : null)
            ->withTransactionResult(array_key_exists('transactionResult', $data) && $data['transactionResult'] !== null ? CoreTransactionResult::fromJson($data['transactionResult']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "boxItems" => $this->getBoxItems() !== null ? $this->getBoxItems()->toJson() : null,
            "transactionId" => $this->getTransactionId(),
            "stampSheet" => $this->getStampSheet(),
            "stampSheetEncryptionKeyId" => $this->getStampSheetEncryptionKeyId(),
            "autoRunStampSheet" => $this->getAutoRunStampSheet(),
            "atomicCommit" => $this->getAtomicCommit(),
            "transaction" => $this->getTransaction(),
            "transactionResult" => $this->getTransactionResult() !== null ? $this->getTransactionResult()->toJson() : null,
        );
    }
}