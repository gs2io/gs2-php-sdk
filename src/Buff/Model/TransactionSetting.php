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

namespace Gs2\Buff\Model;

use Gs2\Core\Model\IModel;


class TransactionSetting implements IModel {
	/**
     * @var bool
	 */
	private $enableAutoRun;
	/**
     * @var bool
	 */
	private $enableAtomicCommit;
	/**
     * @var bool
	 */
	private $transactionUseDistributor;
	/**
     * @var bool
	 */
	private $acquireActionUseJobQueue;
	/**
     * @var string
	 */
	private $distributorNamespaceId;
	/**
     * @var string
	 */
	private $keyId;
	/**
     * @var string
	 */
	private $queueNamespaceId;
	public function getEnableAutoRun(): ?bool {
		return $this->enableAutoRun;
	}
	public function setEnableAutoRun(?bool $enableAutoRun) {
		$this->enableAutoRun = $enableAutoRun;
	}
	public function withEnableAutoRun(?bool $enableAutoRun): TransactionSetting {
		$this->enableAutoRun = $enableAutoRun;
		return $this;
	}
	public function getEnableAtomicCommit(): ?bool {
		return $this->enableAtomicCommit;
	}
	public function setEnableAtomicCommit(?bool $enableAtomicCommit) {
		$this->enableAtomicCommit = $enableAtomicCommit;
	}
	public function withEnableAtomicCommit(?bool $enableAtomicCommit): TransactionSetting {
		$this->enableAtomicCommit = $enableAtomicCommit;
		return $this;
	}
	public function getTransactionUseDistributor(): ?bool {
		return $this->transactionUseDistributor;
	}
	public function setTransactionUseDistributor(?bool $transactionUseDistributor) {
		$this->transactionUseDistributor = $transactionUseDistributor;
	}
	public function withTransactionUseDistributor(?bool $transactionUseDistributor): TransactionSetting {
		$this->transactionUseDistributor = $transactionUseDistributor;
		return $this;
	}
	public function getAcquireActionUseJobQueue(): ?bool {
		return $this->acquireActionUseJobQueue;
	}
	public function setAcquireActionUseJobQueue(?bool $acquireActionUseJobQueue) {
		$this->acquireActionUseJobQueue = $acquireActionUseJobQueue;
	}
	public function withAcquireActionUseJobQueue(?bool $acquireActionUseJobQueue): TransactionSetting {
		$this->acquireActionUseJobQueue = $acquireActionUseJobQueue;
		return $this;
	}
	public function getDistributorNamespaceId(): ?string {
		return $this->distributorNamespaceId;
	}
	public function setDistributorNamespaceId(?string $distributorNamespaceId) {
		$this->distributorNamespaceId = $distributorNamespaceId;
	}
	public function withDistributorNamespaceId(?string $distributorNamespaceId): TransactionSetting {
		$this->distributorNamespaceId = $distributorNamespaceId;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /**
     * @deprecated
     */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @deprecated
     */
	public function withKeyId(?string $keyId): TransactionSetting {
		$this->keyId = $keyId;
		return $this;
	}
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}
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
            ->withAcquireActionUseJobQueue(array_key_exists('acquireActionUseJobQueue', $data) ? $data['acquireActionUseJobQueue'] : null)
            ->withDistributorNamespaceId(array_key_exists('distributorNamespaceId', $data) && $data['distributorNamespaceId'] !== null ? $data['distributorNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "enableAutoRun" => $this->getEnableAutoRun(),
            "enableAtomicCommit" => $this->getEnableAtomicCommit(),
            "transactionUseDistributor" => $this->getTransactionUseDistributor(),
            "acquireActionUseJobQueue" => $this->getAcquireActionUseJobQueue(),
            "distributorNamespaceId" => $this->getDistributorNamespaceId(),
            "keyId" => $this->getKeyId(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
        );
    }
}