<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Lock\Model;

/**
 * ロック
 *
 * @author Game Server Services, Inc.
 *
 */
class Lock {

	/** @var string ロックプールGRN */
	private $lockPoolId;

	/** @var string オーナーID */
	private $userId;

	/** @var string トランザクションID */
	private $transactionId;

	/** @var string リソース名 */
	private $resourceName;

	/** @var int 有効期限 */
	private $ttl;

	/**
	 * ロックプールGRNを取得
	 *
	 * @return string ロックプールGRN
	 */
	public function getLockPoolId() {
		return $this->lockPoolId;
	}

	/**
	 * ロックプールGRNを設定
	 *
	 * @param string $lockPoolId ロックプールGRN
	 */
	public function setLockPoolId($lockPoolId) {
		$this->lockPoolId = $lockPoolId;
	}

	/**
	 * ロックプールGRNを設定
	 *
	 * @param string $lockPoolId ロックプールGRN
	 * @return self
	 */
	public function withLockPoolId($lockPoolId): self {
		$this->setLockPoolId($lockPoolId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $userId オーナーID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $userId オーナーID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * トランザクションIDを取得
	 *
	 * @return string トランザクションID
	 */
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 */
	public function setTransactionId($transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 * @return self
	 */
	public function withTransactionId($transactionId): self {
		$this->setTransactionId($transactionId);
		return $this;
	}

	/**
	 * リソース名を取得
	 *
	 * @return string リソース名
	 */
	public function getResourceName() {
		return $this->resourceName;
	}

	/**
	 * リソース名を設定
	 *
	 * @param string $resourceName リソース名
	 */
	public function setResourceName($resourceName) {
		$this->resourceName = $resourceName;
	}

	/**
	 * リソース名を設定
	 *
	 * @param string $resourceName リソース名
	 * @return self
	 */
	public function withResourceName($resourceName): self {
		$this->setResourceName($resourceName);
		return $this;
	}

	/**
	 * 有効期限を取得
	 *
	 * @return int 有効期限
	 */
	public function getTtl() {
		return $this->ttl;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int $ttl 有効期限
	 */
	public function setTtl($ttl) {
		$this->ttl = $ttl;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int $ttl 有効期限
	 * @return self
	 */
	public function withTtl($ttl): self {
		$this->setTtl($ttl);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Lock
	 */
    static function build(array $array)
    {
        $item = new Lock();
        $item->setLockPoolId(isset($array['lockPoolId']) ? $array['lockPoolId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setTransactionId(isset($array['transactionId']) ? $array['transactionId'] : null);
        $item->setResourceName(isset($array['resourceName']) ? $array['resourceName'] : null);
        $item->setTtl(isset($array['ttl']) ? $array['ttl'] : null);
        return $item;
    }

}