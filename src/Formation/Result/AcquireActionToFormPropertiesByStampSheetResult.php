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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Slot;
use Gs2\Formation\Model\Form;
use Gs2\Formation\Model\Mold;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of acquireActionToFormPropertiesByStampSheet: Execute the acquire action application to form properties as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/formation/stamp_sheet/#gs2formationacquireactionstoformproperties
 */
class AcquireActionToFormPropertiesByStampSheetResult implements IResult {
    /** @var Form Form */
    private $item;
    /** @var Mold Form Storage Area */
    private $mold;
    /** @var string Issued transaction ID */
    private $transactionId;
    /** @var string Stamp sheet */
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

    /** @return Form|null Form */
	public function getItem(): ?Form {
		return $this->item;
	}

    /** @param Form|null $item Form */
	public function setItem(?Form $item) {
		$this->item = $item;
	}

    /**
     * @param Form|null $item Form
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withItem(?Form $item): AcquireActionToFormPropertiesByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    /** @return Mold|null Form Storage Area */
	public function getMold(): ?Mold {
		return $this->mold;
	}

    /** @param Mold|null $mold Form Storage Area */
	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

    /**
     * @param Mold|null $mold Form Storage Area
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withMold(?Mold $mold): AcquireActionToFormPropertiesByStampSheetResult {
		$this->mold = $mold;
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withTransactionId(?string $transactionId): AcquireActionToFormPropertiesByStampSheetResult {
		$this->transactionId = $transactionId;
		return $this;
	}

    /** @return string|null Stamp sheet */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

    /** @param string|null $stampSheet Stamp sheet */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    /**
     * @param string|null $stampSheet Stamp sheet
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withStampSheet(?string $stampSheet): AcquireActionToFormPropertiesByStampSheetResult {
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): AcquireActionToFormPropertiesByStampSheetResult {
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): AcquireActionToFormPropertiesByStampSheetResult {
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withAtomicCommit(?bool $atomicCommit): AcquireActionToFormPropertiesByStampSheetResult {
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withTransaction(?string $transaction): AcquireActionToFormPropertiesByStampSheetResult {
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
     * @return AcquireActionToFormPropertiesByStampSheetResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): AcquireActionToFormPropertiesByStampSheetResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionToFormPropertiesByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionToFormPropertiesByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Form::fromJson($data['item']) : null)
            ->withMold(array_key_exists('mold', $data) && $data['mold'] !== null ? Mold::fromJson($data['mold']) : null)
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
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "mold" => $this->getMold() !== null ? $this->getMold()->toJson() : null,
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