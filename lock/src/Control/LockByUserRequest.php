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

namespace Gs2\Lock\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class LockByUserRequest extends Gs2BasicRequest {

    const FUNCTION = "LockByUser";

	/** @var string ロックプールの名前を指定します。 */
	private $lockPoolName;

	/** @var string ユーザID */
	private $userId;

	/** @var string トランザクションID */
	private $transactionId;

	/** @var string ロック解除するリソースの名前 */
	private $resourceName;

	/** @var int ロックの有効期間(秒) */
	private $ttl;


	/**
	 * ロックプールの名前を指定します。を取得
	 *
	 * @return string ロックプールの名前を指定します。
	 */
	public function getLockPoolName() {
		return $this->lockPoolName;
	}

	/**
	 * ロックプールの名前を指定します。を設定
	 *
	 * @param string $lockPoolName ロックプールの名前を指定します。
	 */
	public function setLockPoolName($lockPoolName) {
		$this->lockPoolName = $lockPoolName;
	}

	/**
	 * ロックプールの名前を指定します。を設定
	 *
	 * @param string $lockPoolName ロックプールの名前を指定します。
	 * @return LockByUserRequest
	 */
	public function withLockPoolName($lockPoolName): LockByUserRequest {
		$this->setLockPoolName($lockPoolName);
		return $this;
	}

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return LockByUserRequest
	 */
	public function withUserId($userId): LockByUserRequest {
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
	 * @return LockByUserRequest
	 */
	public function withTransactionId($transactionId): LockByUserRequest {
		$this->setTransactionId($transactionId);
		return $this;
	}

	/**
	 * ロック解除するリソースの名前を取得
	 *
	 * @return string ロック解除するリソースの名前
	 */
	public function getResourceName() {
		return $this->resourceName;
	}

	/**
	 * ロック解除するリソースの名前を設定
	 *
	 * @param string $resourceName ロック解除するリソースの名前
	 */
	public function setResourceName($resourceName) {
		$this->resourceName = $resourceName;
	}

	/**
	 * ロック解除するリソースの名前を設定
	 *
	 * @param string $resourceName ロック解除するリソースの名前
	 * @return LockByUserRequest
	 */
	public function withResourceName($resourceName): LockByUserRequest {
		$this->setResourceName($resourceName);
		return $this;
	}

	/**
	 * ロックの有効期間(秒)を取得
	 *
	 * @return int ロックの有効期間(秒)
	 */
	public function getTtl() {
		return $this->ttl;
	}

	/**
	 * ロックの有効期間(秒)を設定
	 *
	 * @param int $ttl ロックの有効期間(秒)
	 */
	public function setTtl($ttl) {
		$this->ttl = $ttl;
	}

	/**
	 * ロックの有効期間(秒)を設定
	 *
	 * @param int $ttl ロックの有効期間(秒)
	 * @return LockByUserRequest
	 */
	public function withTtl($ttl): LockByUserRequest {
		$this->setTtl($ttl);
		return $this;
	}

}