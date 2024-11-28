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

class ReceiveClusterRankingReceivedRewardByUserIdResult implements IResult {
    /** @var ClusterRankingModel */
    private $item;
    /** @var array */
    private $acquireActions;
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

	public function getItem(): ?ClusterRankingModel {
		return $this->item;
	}

	public function setItem(?ClusterRankingModel $item) {
		$this->item = $item;
	}

	public function withItem(?ClusterRankingModel $item): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}

	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}

	public function withAcquireActions(?array $acquireActions): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->acquireActions = $acquireActions;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	public function withStampSheet(?string $stampSheet): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->stampSheet = $stampSheet;
		return $this;
	}

	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	public function withStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
		return $this;
	}

	public function getAutoRunStampSheet(): ?bool {
		return $this->autoRunStampSheet;
	}

	public function setAutoRunStampSheet(?bool $autoRunStampSheet) {
		$this->autoRunStampSheet = $autoRunStampSheet;
	}

	public function withAutoRunStampSheet(?bool $autoRunStampSheet): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->autoRunStampSheet = $autoRunStampSheet;
		return $this;
	}

	public function getAtomicCommit(): ?bool {
		return $this->atomicCommit;
	}

	public function setAtomicCommit(?bool $atomicCommit) {
		$this->atomicCommit = $atomicCommit;
	}

	public function withAtomicCommit(?bool $atomicCommit): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->atomicCommit = $atomicCommit;
		return $this;
	}

	public function getTransaction(): ?string {
		return $this->transaction;
	}

	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}

	public function withTransaction(?string $transaction): ReceiveClusterRankingReceivedRewardByUserIdResult {
		$this->transaction = $transaction;
		return $this;
	}

	public function getTransactionResult(): ?CoreTransactionResult {
		return $this->transactionResult;
	}

	public function setTransactionResult(?CoreTransactionResult $transactionResult) {
		$this->transactionResult = $transactionResult;
	}

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
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
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
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
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