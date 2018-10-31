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

namespace Gs2\Identifier\Model;

/**
 * ユーザ
 *
 * @author Game Server Services, Inc.
 *
 */
class Identifier {

	/** @var string ユーザGRN */
	private $identifierId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ユーザID */
	private $userId;

	/** @var string クライアントID */
	private $clientId;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/**
	 * ユーザGRNを取得
	 *
	 * @return string ユーザGRN
	 */
	public function getIdentifierId() {
		return $this->identifierId;
	}

	/**
	 * ユーザGRNを設定
	 *
	 * @param string $identifierId ユーザGRN
	 */
	public function setIdentifierId($identifierId) {
		$this->identifierId = $identifierId;
	}

	/**
	 * ユーザGRNを設定
	 *
	 * @param string $identifierId ユーザGRN
	 * @return self
	 */
	public function withIdentifierId($identifierId): self {
		$this->setIdentifierId($identifierId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
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
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * クライアントIDを取得
	 *
	 * @return string クライアントID
	 */
	public function getClientId() {
		return $this->clientId;
	}

	/**
	 * クライアントIDを設定
	 *
	 * @param string $clientId クライアントID
	 */
	public function setClientId($clientId) {
		$this->clientId = $clientId;
	}

	/**
	 * クライアントIDを設定
	 *
	 * @param string $clientId クライアントID
	 * @return self
	 */
	public function withClientId($clientId): self {
		$this->setClientId($clientId);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Identifier
	 */
    static function build(array $array)
    {
        $item = new Identifier();
        $item->setIdentifierId(isset($array['identifierId']) ? $array['identifierId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setClientId(isset($array['clientId']) ? $array['clientId'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}