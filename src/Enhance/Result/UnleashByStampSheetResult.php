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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\UnleashIndividualMaterialSetting;
use Gs2\Enhance\Model\UnleashQuantityMaterialSetting;
use Gs2\Enhance\Model\UnleashMaterial;
use Gs2\Enhance\Model\UnleashRecipe;
use Gs2\Enhance\Model\UnleashRateEntryModel;
use Gs2\Enhance\Model\UnleashRateModel;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of unleashByStampSheet: Execute unleash as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/enhance/stamp_sheet/#gs2enhanceunleashbyuserid
 */
class UnleashByStampSheetResult implements IResult {
    /** @var UnleashRateModel Unleash Rate Model */
    private $item;
    /** @var string Issued transaction ID */
    private $transactionId;
    /** @var string Stamp sheet used to perform the enhancement process */
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

    /** @return UnleashRateModel|null Unleash Rate Model */
	public function getItem(): ?UnleashRateModel {
		return $this->item;
	}

    /** @param UnleashRateModel|null $item Unleash Rate Model */
	public function setItem(?UnleashRateModel $item) {
		$this->item = $item;
	}

    /**
     * @param UnleashRateModel|null $item Unleash Rate Model
     * @return UnleashByStampSheetResult
     */
	public function withItem(?UnleashRateModel $item): UnleashByStampSheetResult {
		$this->item = $item;
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
     * @return UnleashByStampSheetResult
     */
	public function withTransactionId(?string $transactionId): UnleashByStampSheetResult {
		$this->transactionId = $transactionId;
		return $this;
	}

    /** @return string|null Stamp sheet used to perform the enhancement process */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

    /** @param string|null $stampSheet Stamp sheet used to perform the enhancement process */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    /**
     * @param string|null $stampSheet Stamp sheet used to perform the enhancement process
     * @return UnleashByStampSheetResult
     */
	public function withStampSheet(?string $stampSheet): UnleashByStampSheetResult {
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
     * @return UnleashByStampSheetResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): UnleashByStampSheetResult {
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
     * @return UnleashByStampSheetResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): UnleashByStampSheetResult {
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
     * @return UnleashByStampSheetResult
     */
	public function withAtomicCommit(?bool $atomicCommit): UnleashByStampSheetResult {
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
     * @return UnleashByStampSheetResult
     */
	public function withTransaction(?string $transaction): UnleashByStampSheetResult {
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
     * @return UnleashByStampSheetResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): UnleashByStampSheetResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new UnleashByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? UnleashRateModel::fromJson($data['item']) : null)
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