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
use Gs2\Ranking2\Model\ClusterRankingModel;
use Gs2\Core\Model\VerifyActionResult as CoreVerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult as CoreConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult as CoreAcquireActionResult;
use Gs2\Core\Model\TransactionResult as CoreTransactionResult;

/**
 * Result of receiveClusterRankingReceivedRewardByUserId: Receive Cluster Ranking Reward specifying User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#receiveclusterrankingreceivedrewardbyuserid
 */
class ReceiveClusterRankingReceivedRewardByUserIdResult implements IResult {
    /** @var ClusterRankingModel Cluster Ranking Model */
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

    /** @return ClusterRankingModel|null Cluster Ranking Model */
	public function getItem(): ?ClusterRankingModel {
		return $this->item;
	}

    /** @param ClusterRankingModel|null $item Cluster Ranking Model */
	public function setItem(?ClusterRankingModel $item) {
		$this->item = $item;
	}

    /**
     * @param ClusterRankingModel|null $item Cluster Ranking Model
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withItem(?ClusterRankingModel $item): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withAcquireActions(?array $acquireActions): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withTransactionId(?string $transactionId): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withStampSheet(?string $stampSheet): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withAutoRunStampSheet(?bool $autoRunStampSheet): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withAtomicCommit(?bool $atomicCommit): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withTransaction(?string $transaction): ReceiveClusterRankingReceivedRewardByUserIdResult {
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
     * @return ReceiveClusterRankingReceivedRewardByUserIdResult
     */
	public function withTransactionResult(?CoreTransactionResult $transactionResult): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->transactionResult = $transactionResult;
		return $this;
	}

    public static function fromJson(?array $data): ?ReceiveClusterRankingReceivedRewardByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new ReceiveClusterRankingReceivedRewardByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ClusterRankingModel::fromJson($data['item']) : null)
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