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

namespace Gs2\Realtime\Model;

/**
 * ギャザリング
 *
 * @author Game Server Services, Inc.
 *
 */
class Gathering {

	/** @var string ギャザリングID */
	private $gatheringId;

	/** @var string ギャザリングプールGRN */
	private $gatheringPoolId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ギャザリング名 */
	private $name;

	/** @var string ホストIPアドレス */
	private $ipAddress;

	/** @var int ホストポート */
	private $port;

	/** @var string 暗号鍵 */
	private $secret;

	/** @var array 参加可能なユーザIDリスト */
	private $userIds;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ギャザリングIDを取得
	 *
	 * @return string ギャザリングID
	 */
	public function getGatheringId() {
		return $this->gatheringId;
	}

	/**
	 * ギャザリングIDを設定
	 *
	 * @param string $gatheringId ギャザリングID
	 */
	public function setGatheringId($gatheringId) {
		$this->gatheringId = $gatheringId;
	}

	/**
	 * ギャザリングIDを設定
	 *
	 * @param string $gatheringId ギャザリングID
	 * @return self
	 */
	public function withGatheringId($gatheringId): self {
		$this->setGatheringId($gatheringId);
		return $this;
	}

	/**
	 * ギャザリングプールGRNを取得
	 *
	 * @return string ギャザリングプールGRN
	 */
	public function getGatheringPoolId() {
		return $this->gatheringPoolId;
	}

	/**
	 * ギャザリングプールGRNを設定
	 *
	 * @param string $gatheringPoolId ギャザリングプールGRN
	 */
	public function setGatheringPoolId($gatheringPoolId) {
		$this->gatheringPoolId = $gatheringPoolId;
	}

	/**
	 * ギャザリングプールGRNを設定
	 *
	 * @param string $gatheringPoolId ギャザリングプールGRN
	 * @return self
	 */
	public function withGatheringPoolId($gatheringPoolId): self {
		$this->setGatheringPoolId($gatheringPoolId);
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
	 * ギャザリング名を取得
	 *
	 * @return string ギャザリング名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string $name ギャザリング名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ギャザリング名を設定
	 *
	 * @param string $name ギャザリング名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * ホストIPアドレスを取得
	 *
	 * @return string ホストIPアドレス
	 */
	public function getIpAddress() {
		return $this->ipAddress;
	}

	/**
	 * ホストIPアドレスを設定
	 *
	 * @param string $ipAddress ホストIPアドレス
	 */
	public function setIpAddress($ipAddress) {
		$this->ipAddress = $ipAddress;
	}

	/**
	 * ホストIPアドレスを設定
	 *
	 * @param string $ipAddress ホストIPアドレス
	 * @return self
	 */
	public function withIpAddress($ipAddress): self {
		$this->setIpAddress($ipAddress);
		return $this;
	}

	/**
	 * ホストポートを取得
	 *
	 * @return int ホストポート
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * ホストポートを設定
	 *
	 * @param int $port ホストポート
	 */
	public function setPort($port) {
		$this->port = $port;
	}

	/**
	 * ホストポートを設定
	 *
	 * @param int $port ホストポート
	 * @return self
	 */
	public function withPort($port): self {
		$this->setPort($port);
		return $this;
	}

	/**
	 * 暗号鍵を取得
	 *
	 * @return string 暗号鍵
	 */
	public function getSecret() {
		return $this->secret;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string $secret 暗号鍵
	 */
	public function setSecret($secret) {
		$this->secret = $secret;
	}

	/**
	 * 暗号鍵を設定
	 *
	 * @param string $secret 暗号鍵
	 * @return self
	 */
	public function withSecret($secret): self {
		$this->setSecret($secret);
		return $this;
	}

	/**
	 * 参加可能なユーザIDリストを取得
	 *
	 * @return array 参加可能なユーザIDリスト
	 */
	public function getUserIds() {
		return $this->userIds;
	}

	/**
	 * 参加可能なユーザIDリストを設定
	 *
	 * @param array $userIds 参加可能なユーザIDリスト
	 */
	public function setUserIds($userIds) {
		$this->userIds = $userIds;
	}

	/**
	 * 参加可能なユーザIDリストを設定
	 *
	 * @param array $userIds 参加可能なユーザIDリスト
	 * @return self
	 */
	public function withUserIds($userIds): self {
		$this->setUserIds($userIds);
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
	 * @return Gathering
	 */
    static function build(array $array)
    {
        $item = new Gathering();
        $item->setGatheringId(isset($array['gatheringId']) ? $array['gatheringId'] : null);
        $item->setGatheringPoolId(isset($array['gatheringPoolId']) ? $array['gatheringPoolId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setIpAddress(isset($array['ipAddress']) ? $array['ipAddress'] : null);
        $item->setPort(isset($array['port']) ? $array['port'] : null);
        $item->setSecret(isset($array['secret']) ? $array['secret'] : null);
        $item->setUserIds(isset($array['userIds']) ? $array['userIds'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}