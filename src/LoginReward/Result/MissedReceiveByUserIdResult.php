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

namespace Gs2\LoginReward\Result;

use Gs2\Core\Model\IResult;
use Gs2\LoginReward\Model\ReceiveStatus;
use Gs2\LoginReward\Model\AcquireAction;
use Gs2\LoginReward\Model\Reward;
use Gs2\LoginReward\Model\VerifyAction;
use Gs2\LoginReward\Model\ConsumeAction;
use Gs2\LoginReward\Model\BonusModel;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of missedReceiveByUserId: Receive missed login rewards by userId
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#missedreceivebyuserid
 */
class MissedReceiveByUserIdResult implements IResult {
    /** @var ReceiveStatus Receive status */
    private $item;
    /** @var BonusModel Login Bonus Model */
    private $bonusModel;
    /** @var string Issued transaction ID */
    private $transactionId;
    /** @var string Stamp sheet used to execute the receipt of login bonuses */
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

    /** @return ReceiveStatus|null Receive status */
	public function getItem(): ?ReceiveStatus {
		return $this->item;
	}

    /** @param ReceiveStatus|null $item Receive status */
	public function setItem(?ReceiveStatus $item) {
		$this->item = $item;
	}

    /**
     * @param ReceiveStatus|null $item Receive status
     * @return MissedReceiveByUserIdResult
     */
	public function withItem(?ReceiveStatus $item): MissedReceiveByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return BonusModel|null Login Bonus Model */
	public function getBonusModel(): ?BonusModel {
		return $this->bonusModel;
	}

    /** @param BonusModel|null $bonusModel Login Bonus Model */
	public function setBonusModel(?BonusModel $bonusModel) {
		$this->bonusModel = $bonusModel;
	}

    /**
     * @param BonusModel|null $bonusModel Login Bonus Model
     * @return MissedReceiveByUserIdResult
     */
	public function withBonusModel(?BonusModel $bonusModel): MissedReceiveByUserIdResult {
		$this->bonusModel = $bonusModel;
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
     * @return MissedReceiveByUserIdResult
     */
	public function withTransactionId(?string $transactionId): MissedReceiveByUserIdResult {
		$this->transactionId = $transactionId;
		return $this;
	}

    /** @return string|null Stamp sheet used to execute the receipt of login bonuses */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

    /** @param string|null $stampSheet Stamp sheet used to execute the receipt of login bonuses */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    /**
     * @param string|null $stampSheet Stamp sheet used to execute the receipt of login bonuses
     * @return MissedReceiveByUserIdResult
     */
	public function withStampSheet(?string $stampSheet): MissedReceiveByUserIdResult {
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
     * @return MissedReceiveByUserIdResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): MissedReceiveByUserIdResult {
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
     * @return MissedReceiveByUserIdResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): MissedReceiveByUserIdResult {
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
     * @return MissedReceiveByUserIdResult
     */
	public function withAtomicCommit(?bool $atomicCommit): MissedReceiveByUserIdResult {
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
     * @return MissedReceiveByUserIdResult
     */
	public function withTransaction(?string $transaction): MissedReceiveByUserIdResult {
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
     * @return MissedReceiveByUserIdResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): MissedReceiveByUserIdResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?MissedReceiveByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new MissedReceiveByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ReceiveStatus::fromJson($data['item']) : null)
            ->withBonusModel(array_key_exists('bonusModel', $data) && $data['bonusModel'] !== null ? BonusModel::fromJson($data['bonusModel']) : null)
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
            "bonusModel" => $this->getBonusModel() !== null ? $this->getBonusModel()->toJson() : null,
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