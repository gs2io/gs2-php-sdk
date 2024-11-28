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
use Gs2\Enhance\Model\BonusRate;
use Gs2\Enhance\Model\RateModel;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

class DirectEnhanceResult implements IResult {
    /** @var RateModel */
    private $item;
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
    /** @var int */
    private $acquireExperience;
    /** @var float */
    private $bonusRate;

	public function getItem(): ?RateModel {
		return $this->item;
	}

	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

	public function withItem(?RateModel $item): DirectEnhanceResult {
		$this->item = $item;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): DirectEnhanceResult {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): DirectEnhanceResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): DirectEnhanceResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

	public function withAutoRunStampSheet(?bool $autoRunStampSheet): DirectEnhanceResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

	public function getAtomicCommit(): ?bool {
		return $this->atomicCommit;
	}

	public function setAtomicCommit(?bool $atomicCommit) {
		$this->atomicCommit = $atomicCommit;
	}

	public function withAtomicCommit(?bool $atomicCommit): DirectEnhanceResult {
		$this->atomicCommit = $atomicCommit;
		return $this;
	}

	public function getTransaction(): ?string {
		return $this->transaction;
	}

	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}

	public function withTransaction(?string $transaction): DirectEnhanceResult {
		$this->transaction = $transaction;
		return $this;
	}

	public function getTransactionResult(): ?CoreTransactionResult {
		return $this->transactionResult;
	}

	public function setTransactionResult(?CoreTransactionResult $transactionResult) {
		$this->transactionResult = $transactionResult;
	}

	public function withTransactionResult(?CoreTransactionResult $transactionResult): DirectEnhanceResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

	public function getAcquireExperience(): ?int {
		return $this->acquireExperience;
	}

	public function setAcquireExperience(?int $acquireExperience) {
		$this->acquireExperience = $acquireExperience;
	}

	public function withAcquireExperience(?int $acquireExperience): DirectEnhanceResult {
		$this->acquireExperience = $acquireExperience;
		return $this;
	}

	public function getBonusRate(): ?float {
		return $this->bonusRate;
	}

	public function setBonusRate(?float $bonusRate) {
		$this->bonusRate = $bonusRate;
	}

	public function withBonusRate(?float $bonusRate): DirectEnhanceResult {
		$this->bonusRate = $bonusRate;
		return $this;
	}

    public static function fromJson(?array $data): ?DirectEnhanceResult {
        if ($data === null) {
            return null;
        }
        return (new DirectEnhanceResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RateModel::fromJson($data['item']) : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withStampSheet(array_key_exists('stampSheet', $data) && $data['stampSheet'] !== null ? $data['stampSheet'] : null)
            ->withStampSheetEncryptionKeyId(array_key_exists('stampSheetEncryptionKeyId', $data) && $data['stampSheetEncryptionKeyId'] !== null ? $data['stampSheetEncryptionKeyId'] : null)
            ->withAutoRunStampSheet(array_key_exists('autoRunStampSheet', $data) ? $data['autoRunStampSheet'] : null)
            ->withAtomicCommit(array_key_exists('atomicCommit', $data) ? $data['atomicCommit'] : null)
            ->withTransaction(array_key_exists('transaction', $data) && $data['transaction'] !== null ? $data['transaction'] : null)
            ->withTransactionResult(array_key_exists('transactionResult', $data) && $data['transactionResult'] !== null ? CoreTransactionResult::fromJson($data['transactionResult']) : null)
            ->withAcquireExperience(array_key_exists('acquireExperience', $data) && $data['acquireExperience'] !== null ? $data['acquireExperience'] : null)
            ->withBonusRate(array_key_exists('bonusRate', $data) && $data['bonusRate'] !== null ? $data['bonusRate'] : null);
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
            "acquireExperience" => $this->getAcquireExperience(),
            "bonusRate" => $this->getBonusRate(),
        );
    }
}