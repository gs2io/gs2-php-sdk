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

namespace Gs2\Gold\Model;

/**
 * ウォレット
 *
 * @author Game Server Services, Inc.
 *
 */
class Wallet {

	/** @var string ウォレットGRN */
	private $walletId;

	/** @var string ユーザID */
	private $userId;

	/** @var string ゴールド名 */
	private $goldName;

	/** @var string メタデータ */
	private $meta;

	/** @var long 残高 */
	private $balance;

	/** @var long 直近の期間の取得量 */
	private $latestGain;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ウォレットGRNを取得
	 *
	 * @return string ウォレットGRN
	 */
	public function getWalletId() {
		return $this->walletId;
	}

	/**
	 * ウォレットGRNを設定
	 *
	 * @param string $walletId ウォレットGRN
	 */
	public function setWalletId($walletId) {
		$this->walletId = $walletId;
	}

	/**
	 * ウォレットGRNを設定
	 *
	 * @param string $walletId ウォレットGRN
	 * @return self
	 */
	public function withWalletId($walletId): self {
		$this->setWalletId($walletId);
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
	 * ゴールド名を取得
	 *
	 * @return string ゴールド名
	 */
	public function getGoldName() {
		return $this->goldName;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $goldName ゴールド名
	 */
	public function setGoldName($goldName) {
		$this->goldName = $goldName;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $goldName ゴールド名
	 * @return self
	 */
	public function withGoldName($goldName): self {
		$this->setGoldName($goldName);
		return $this;
	}

	/**
	 * メタデータを取得
	 *
	 * @return string メタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 * @return self
	 */
	public function withMeta($meta): self {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 残高を取得
	 *
	 * @return long 残高
	 */
	public function getBalance() {
		return $this->balance;
	}

	/**
	 * 残高を設定
	 *
	 * @param long $balance 残高
	 */
	public function setBalance($balance) {
		$this->balance = $balance;
	}

	/**
	 * 残高を設定
	 *
	 * @param long $balance 残高
	 * @return self
	 */
	public function withBalance($balance): self {
		$this->setBalance($balance);
		return $this;
	}

	/**
	 * 直近の期間の取得量を取得
	 *
	 * @return long 直近の期間の取得量
	 */
	public function getLatestGain() {
		return $this->latestGain;
	}

	/**
	 * 直近の期間の取得量を設定
	 *
	 * @param long $latestGain 直近の期間の取得量
	 */
	public function setLatestGain($latestGain) {
		$this->latestGain = $latestGain;
	}

	/**
	 * 直近の期間の取得量を設定
	 *
	 * @param long $latestGain 直近の期間の取得量
	 * @return self
	 */
	public function withLatestGain($latestGain): self {
		$this->setLatestGain($latestGain);
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
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Wallet
	 */
    static function build(array $array)
    {
        $item = new Wallet();
        $item->setWalletId(isset($array['walletId']) ? $array['walletId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setGoldName(isset($array['goldName']) ? $array['goldName'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setBalance(isset($array['balance']) ? $array['balance'] : null);
        $item->setLatestGain(isset($array['latestGain']) ? $array['latestGain'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}