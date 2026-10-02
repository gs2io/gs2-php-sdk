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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


/**
 * Transaction Setting
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#transactionsetting
 */
class TransactionSetting implements IModel {
	/**
     * @var bool Whether to automatically execute issued transactions on the server side
	 */
	private $enableAutoRun;
	/**
     * @var bool Whether to commit transactions atomically
	 */
	private $enableAtomicCommit;
	/**
     * @var bool Whether to execute transactions asynchronously
	 */
	private $transactionUseDistributor;
	/**
     * @var bool Whether to execute the commit processing of the script result asynchronously
	 */
	private $commitScriptResultInUseDistributor;
	/**
     * @var bool Whether to use GS2-JobQueue to execute the acquire action
	 */
	private $acquireActionUseJobQueue;
	/**
     * @var bool Whether to execute the actions of an atomic commit sequentially so that multiple actions may update the same row
	 */
	private $enableSequentialExecution;
	/**
     * @var string GS2-Distributor Namespace GRN used to execute transactions
	 */
	private $distributorNamespaceId;
	/**
     * @var string GS2-Key Encryption Key used to sign the transaction
	 */
	private $keyId;
	/**
     * @var string GS2-JobQueue Namespace GRN used to execute transactions
	 */
	private $queueNamespaceId;
    /** @return bool|null Whether to automatically execute issued transactions on the server side */
	public function getEnableAutoRun(): ?bool {
		return $this->enableAutoRun;
	}
    /** @param bool|null $enableAutoRun Whether to automatically execute issued transactions on the server side */
	public function setEnableAutoRun(?bool $enableAutoRun) {
		$this->enableAutoRun = $enableAutoRun;
	}
    /**
     * @param bool|null $enableAutoRun Whether to automatically execute issued transactions on the server side
     * @return TransactionSetting
     */
	public function withEnableAutoRun(?bool $enableAutoRun): TransactionSetting {
		$this->enableAutoRun = $enableAutoRun;
		return $this;
	}
    /** @return bool|null Whether to commit transactions atomically */
	public function getEnableAtomicCommit(): ?bool {
		return $this->enableAtomicCommit;
	}
    /** @param bool|null $enableAtomicCommit Whether to commit transactions atomically */
	public function setEnableAtomicCommit(?bool $enableAtomicCommit) {
		$this->enableAtomicCommit = $enableAtomicCommit;
	}
    /**
     * @param bool|null $enableAtomicCommit Whether to commit transactions atomically
     * @return TransactionSetting
     */
	public function withEnableAtomicCommit(?bool $enableAtomicCommit): TransactionSetting {
		$this->enableAtomicCommit = $enableAtomicCommit;
		return $this;
	}
    /** @return bool|null Whether to execute transactions asynchronously */
	public function getTransactionUseDistributor(): ?bool {
		return $this->transactionUseDistributor;
	}
    /** @param bool|null $transactionUseDistributor Whether to execute transactions asynchronously */
	public function setTransactionUseDistributor(?bool $transactionUseDistributor) {
		$this->transactionUseDistributor = $transactionUseDistributor;
	}
    /**
     * @param bool|null $transactionUseDistributor Whether to execute transactions asynchronously
     * @return TransactionSetting
     */
	public function withTransactionUseDistributor(?bool $transactionUseDistributor): TransactionSetting {
		$this->transactionUseDistributor = $transactionUseDistributor;
		return $this;
	}
    /** @return bool|null Whether to execute the commit processing of the script result asynchronously */
	public function getCommitScriptResultInUseDistributor(): ?bool {
		return $this->commitScriptResultInUseDistributor;
	}
    /** @param bool|null $commitScriptResultInUseDistributor Whether to execute the commit processing of the script result asynchronously */
	public function setCommitScriptResultInUseDistributor(?bool $commitScriptResultInUseDistributor) {
		$this->commitScriptResultInUseDistributor = $commitScriptResultInUseDistributor;
	}
    /**
     * @param bool|null $commitScriptResultInUseDistributor Whether to execute the commit processing of the script result asynchronously
     * @return TransactionSetting
     */
	public function withCommitScriptResultInUseDistributor(?bool $commitScriptResultInUseDistributor): TransactionSetting {
		$this->commitScriptResultInUseDistributor = $commitScriptResultInUseDistributor;
		return $this;
	}
    /** @return bool|null Whether to use GS2-JobQueue to execute the acquire action */
	public function getAcquireActionUseJobQueue(): ?bool {
		return $this->acquireActionUseJobQueue;
	}
    /** @param bool|null $acquireActionUseJobQueue Whether to use GS2-JobQueue to execute the acquire action */
	public function setAcquireActionUseJobQueue(?bool $acquireActionUseJobQueue) {
		$this->acquireActionUseJobQueue = $acquireActionUseJobQueue;
	}
    /**
     * @param bool|null $acquireActionUseJobQueue Whether to use GS2-JobQueue to execute the acquire action
     * @return TransactionSetting
     */
	public function withAcquireActionUseJobQueue(?bool $acquireActionUseJobQueue): TransactionSetting {
		$this->acquireActionUseJobQueue = $acquireActionUseJobQueue;
		return $this;
	}
    /** @return bool|null Whether to execute the actions of an atomic commit sequentially so that multiple actions may update the same row */
	public function getEnableSequentialExecution(): ?bool {
		return $this->enableSequentialExecution;
	}
    /** @param bool|null $enableSequentialExecution Whether to execute the actions of an atomic commit sequentially so that multiple actions may update the same row */
	public function setEnableSequentialExecution(?bool $enableSequentialExecution) {
		$this->enableSequentialExecution = $enableSequentialExecution;
	}
    /**
     * @param bool|null $enableSequentialExecution Whether to execute the actions of an atomic commit sequentially so that multiple actions may update the same row
     * @return TransactionSetting
     */
	public function withEnableSequentialExecution(?bool $enableSequentialExecution): TransactionSetting {
		$this->enableSequentialExecution = $enableSequentialExecution;
		return $this;
	}
    /** @return string|null GS2-Distributor Namespace GRN used to execute transactions */
	public function getDistributorNamespaceId(): ?string {
		return $this->distributorNamespaceId;
	}
    /** @param string|null $distributorNamespaceId GS2-Distributor Namespace GRN used to execute transactions */
	public function setDistributorNamespaceId(?string $distributorNamespaceId) {
		$this->distributorNamespaceId = $distributorNamespaceId;
	}
    /**
     * @param string|null $distributorNamespaceId GS2-Distributor Namespace GRN used to execute transactions
     * @return TransactionSetting
     */
	public function withDistributorNamespaceId(?string $distributorNamespaceId): TransactionSetting {
		$this->distributorNamespaceId = $distributorNamespaceId;
		return $this;
	}
    /**
     * @return string|null GS2-Key Encryption Key used to sign the transaction
     * @deprecated
     */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /**
     * @param string|null $keyId GS2-Key Encryption Key used to sign the transaction
     * @deprecated
     */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId GS2-Key Encryption Key used to sign the transaction
     * @return TransactionSetting
     * @deprecated
     */
	public function withKeyId(?string $keyId): TransactionSetting {
		$this->keyId = $keyId;
		return $this;
	}
    /** @return string|null GS2-JobQueue Namespace GRN used to execute transactions */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}
    /** @param string|null $queueNamespaceId GS2-JobQueue Namespace GRN used to execute transactions */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}
    /**
     * @param string|null $queueNamespaceId GS2-JobQueue Namespace GRN used to execute transactions
     * @return TransactionSetting
     */
	public function withQueueNamespaceId(?string $queueNamespaceId): TransactionSetting {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?TransactionSetting {
        if ($data === null) {
            return null;
        }
        return (new TransactionSetting())
            ->withEnableAutoRun(array_key_exists('enableAutoRun', $data) ? $data['enableAutoRun'] : null)
            ->withEnableAtomicCommit(array_key_exists('enableAtomicCommit', $data) ? $data['enableAtomicCommit'] : null)
            ->withTransactionUseDistributor(array_key_exists('transactionUseDistributor', $data) ? $data['transactionUseDistributor'] : null)
            ->withCommitScriptResultInUseDistributor(array_key_exists('commitScriptResultInUseDistributor', $data) ? $data['commitScriptResultInUseDistributor'] : null)
            ->withAcquireActionUseJobQueue(array_key_exists('acquireActionUseJobQueue', $data) ? $data['acquireActionUseJobQueue'] : null)
            ->withEnableSequentialExecution(array_key_exists('enableSequentialExecution', $data) ? $data['enableSequentialExecution'] : null)
            ->withDistributorNamespaceId(array_key_exists('distributorNamespaceId', $data) && $data['distributorNamespaceId'] !== null ? $data['distributorNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "enableAutoRun" => $this->getEnableAutoRun(),
            "enableAtomicCommit" => $this->getEnableAtomicCommit(),
            "transactionUseDistributor" => $this->getTransactionUseDistributor(),
            "commitScriptResultInUseDistributor" => $this->getCommitScriptResultInUseDistributor(),
            "acquireActionUseJobQueue" => $this->getAcquireActionUseJobQueue(),
            "enableSequentialExecution" => $this->getEnableSequentialExecution(),
            "distributorNamespaceId" => $this->getDistributorNamespaceId(),
            "keyId" => $this->getKeyId(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
        );
    }
}