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

namespace Gs2\Experience\Result;

use Gs2\Core\Model\IResult;
use Gs2\Experience\Model\AcquireAction;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

class MultiplyAcquireActionsByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var string */
    private $transactionId;
    /** @var string */
    private $stampSheet;
    /** @var string */
    private $stampSheetEncryptionKeyId;
    /** @var bool */
    private $autoRunStampSheet;
    /** @var bool */
    private $atomicCommit;
    /** @var string */
    private $transaction;
    /** @var CoreTransactionResult */
    private $transactionResult;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): MultiplyAcquireActionsByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): MultiplyAcquireActionsByUserIdResult {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): MultiplyAcquireActionsByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): MultiplyAcquireActionsByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

	public function withAutoRunStampSheet(?bool $autoRunStampSheet): MultiplyAcquireActionsByUserIdResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

	public function getAtomicCommit(): ?bool {
		return $this->atomicCommit;
	}

	public function setAtomicCommit(?bool $atomicCommit) {
		$this->atomicCommit = $atomicCommit;
	}

	public function withAtomicCommit(?bool $atomicCommit): MultiplyAcquireActionsByUserIdResult {
		$this->atomicCommit = $atomicCommit;
		return $this;
	}

	public function getTransaction(): ?string {
		return $this->transaction;
	}

	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}

	public function withTransaction(?string $transaction): MultiplyAcquireActionsByUserIdResult {
		$this->transaction = $transaction;
		return $this;
	}

	public function getTransactionResult(): ?CoreTransactionResult {
		return $this->transactionResult;
	}

	public function setTransactionResult(?CoreTransactionResult $transactionResult) {
		$this->transactionResult = $transactionResult;
	}

	public function withTransactionResult(?CoreTransactionResult $transactionResult): MultiplyAcquireActionsByUserIdResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?MultiplyAcquireActionsByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new MultiplyAcquireActionsByUserIdResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['items']
            ))
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