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

namespace Gs2\Lock\Model;

use Gs2\Core\Model\IModel;

/**
 * ミューテックス
 *
 * @author Game Server Services, Inc.
 *
 */
class Mutex implements IModel {
	/**
     * @var string ミューテックス
	 */
	protected $mutexId;

	/**
	 * ミューテックスを取得
	 *
	 * @return string|null ミューテックス
	 */
	public function getMutexId(): ?string {
		return $this->mutexId;
	}

	/**
	 * ミューテックスを設定
	 *
	 * @param string|null $mutexId ミューテックス
	 */
	public function setMutexId(?string $mutexId) {
		$this->mutexId = $mutexId;
	}

	/**
	 * ミューテックスを設定
	 *
	 * @param string|null $mutexId ミューテックス
	 * @return Mutex $this
	 */
	public function withMutexId(?string $mutexId): Mutex {
		$this->mutexId = $mutexId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Mutex $this
	 */
	public function withUserId(?string $userId): Mutex {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string プロパティID
	 */
	protected $propertyId;

	/**
	 * プロパティIDを取得
	 *
	 * @return string|null プロパティID
	 */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	/**
	 * プロパティIDを設定
	 *
	 * @param string|null $propertyId プロパティID
	 * @return Mutex $this
	 */
	public function withPropertyId(?string $propertyId): Mutex {
		$this->propertyId = $propertyId;
		return $this;
	}
	/**
     * @var string ロックを取得したトランザクションID
	 */
	protected $transactionId;

	/**
	 * ロックを取得したトランザクションIDを取得
	 *
	 * @return string|null ロックを取得したトランザクションID
	 */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	/**
	 * ロックを取得したトランザクションIDを設定
	 *
	 * @param string|null $transactionId ロックを取得したトランザクションID
	 */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * ロックを取得したトランザクションIDを設定
	 *
	 * @param string|null $transactionId ロックを取得したトランザクションID
	 * @return Mutex $this
	 */
	public function withTransactionId(?string $transactionId): Mutex {
		$this->transactionId = $transactionId;
		return $this;
	}
	/**
     * @var int 参照回数
	 */
	protected $referenceCount;

	/**
	 * 参照回数を取得
	 *
	 * @return int|null 参照回数
	 */
	public function getReferenceCount(): ?int {
		return $this->referenceCount;
	}

	/**
	 * 参照回数を設定
	 *
	 * @param int|null $referenceCount 参照回数
	 */
	public function setReferenceCount(?int $referenceCount) {
		$this->referenceCount = $referenceCount;
	}

	/**
	 * 参照回数を設定
	 *
	 * @param int|null $referenceCount 参照回数
	 * @return Mutex $this
	 */
	public function withReferenceCount(?int $referenceCount): Mutex {
		$this->referenceCount = $referenceCount;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Mutex $this
	 */
	public function withCreatedAt(?int $createdAt): Mutex {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int ロックの有効期限
	 */
	protected $ttlAt;

	/**
	 * ロックの有効期限を取得
	 *
	 * @return int|null ロックの有効期限
	 */
	public function getTtlAt(): ?int {
		return $this->ttlAt;
	}

	/**
	 * ロックの有効期限を設定
	 *
	 * @param int|null $ttlAt ロックの有効期限
	 */
	public function setTtlAt(?int $ttlAt) {
		$this->ttlAt = $ttlAt;
	}

	/**
	 * ロックの有効期限を設定
	 *
	 * @param int|null $ttlAt ロックの有効期限
	 * @return Mutex $this
	 */
	public function withTtlAt(?int $ttlAt): Mutex {
		$this->ttlAt = $ttlAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "mutexId" => $this->mutexId,
            "userId" => $this->userId,
            "propertyId" => $this->propertyId,
            "transactionId" => $this->transactionId,
            "referenceCount" => $this->referenceCount,
            "createdAt" => $this->createdAt,
            "ttlAt" => $this->ttlAt,
        );
    }

    public static function fromJson(array $data): Mutex {
        $model = new Mutex();
        $model->setMutexId(isset($data["mutexId"]) ? $data["mutexId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPropertyId(isset($data["propertyId"]) ? $data["propertyId"] : null);
        $model->setTransactionId(isset($data["transactionId"]) ? $data["transactionId"] : null);
        $model->setReferenceCount(isset($data["referenceCount"]) ? $data["referenceCount"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setTtlAt(isset($data["ttlAt"]) ? $data["ttlAt"] : null);
        return $model;
    }
}