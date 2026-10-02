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

namespace Gs2\Ranking2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking2\Model\AcquireAction;
use Gs2\Ranking2\Model\RankingReward;
use Gs2\Ranking2\Model\GlobalRankingModel;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of receiveGlobalRankingReceivedReward: Receive Global Ranking Reward
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveglobalrankingreceivedreward
 */
class ReceiveGlobalRankingReceivedRewardResult implements IResult {
    /** @var GlobalRankingModel Global Ranking Model */
    private $item;
    /** @var array List of Acquire Actions to be performed when rewards are received */
    private $acquireActions;
    /** @var string Issued transaction ID */
    private $transactionId;
    /** @var string Stamp sheet used to execute the exchange process */
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

    /** @return GlobalRankingModel|null Global Ranking Model */
	public function getItem(): ?GlobalRankingModel {
		return $this->item;
	}

    /** @param GlobalRankingModel|null $item Global Ranking Model */
	public function setItem(?GlobalRankingModel $item) {
		$this->item = $item;
	}

    /**
     * @param GlobalRankingModel|null $item Global Ranking Model
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withItem(?GlobalRankingModel $item): ReceiveGlobalRankingReceivedRewardResult {
		$this->item = $item;
		return $this;
	}

    /** @return array|null List of Acquire Actions to be performed when rewards are received */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

    /** @param array|null $acquireActions List of Acquire Actions to be performed when rewards are received */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

    /**
     * @param array|null $acquireActions List of Acquire Actions to be performed when rewards are received
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withAcquireActions(?array $acquireActions): ReceiveGlobalRankingReceivedRewardResult {
		$this->acquireActions = $acquireActions;
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withTransactionId(?string $transactionId): ReceiveGlobalRankingReceivedRewardResult {
		$this->transactionId = $transactionId;
		return $this;
	}

    /** @return string|null Stamp sheet used to execute the exchange process */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

    /** @param string|null $stampSheet Stamp sheet used to execute the exchange process */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    /**
     * @param string|null $stampSheet Stamp sheet used to execute the exchange process
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withStampSheet(?string $stampSheet): ReceiveGlobalRankingReceivedRewardResult {
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): ReceiveGlobalRankingReceivedRewardResult {
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): ReceiveGlobalRankingReceivedRewardResult {
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withAtomicCommit(?bool $atomicCommit): ReceiveGlobalRankingReceivedRewardResult {
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withTransaction(?string $transaction): ReceiveGlobalRankingReceivedRewardResult {
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
     * @return ReceiveGlobalRankingReceivedRewardResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): ReceiveGlobalRankingReceivedRewardResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?ReceiveGlobalRankingReceivedRewardResult {
        if ($data === null) {
            return null;
        }
        return (new ReceiveGlobalRankingReceivedRewardResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GlobalRankingModel::fromJson($data['item']) : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
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
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
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