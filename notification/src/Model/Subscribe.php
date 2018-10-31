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

namespace Gs2\Notification\Model;

/**
 * 購読
 *
 * @author Game Server Services, Inc.
 *
 */
class Subscribe {

	/** @var string 購読GRN */
	private $subscribeId;

	/** @var string 通知GRN */
	private $notificationId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string 通知方法 */
	private $type;

	/** @var string type = email: メールアドレス */
	private $endpoint;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 購読GRNを取得
	 *
	 * @return string 購読GRN
	 */
	public function getSubscribeId() {
		return $this->subscribeId;
	}

	/**
	 * 購読GRNを設定
	 *
	 * @param string $subscribeId 購読GRN
	 */
	public function setSubscribeId($subscribeId) {
		$this->subscribeId = $subscribeId;
	}

	/**
	 * 購読GRNを設定
	 *
	 * @param string $subscribeId 購読GRN
	 * @return self
	 */
	public function withSubscribeId($subscribeId): self {
		$this->setSubscribeId($subscribeId);
		return $this;
	}

	/**
	 * 通知GRNを取得
	 *
	 * @return string 通知GRN
	 */
	public function getNotificationId() {
		return $this->notificationId;
	}

	/**
	 * 通知GRNを設定
	 *
	 * @param string $notificationId 通知GRN
	 */
	public function setNotificationId($notificationId) {
		$this->notificationId = $notificationId;
	}

	/**
	 * 通知GRNを設定
	 *
	 * @param string $notificationId 通知GRN
	 * @return self
	 */
	public function withNotificationId($notificationId): self {
		$this->setNotificationId($notificationId);
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
	 * 通知方法を取得
	 *
	 * @return string 通知方法
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 通知方法を設定
	 *
	 * @param string $type 通知方法
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 通知方法を設定
	 *
	 * @param string $type 通知方法
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
		return $this;
	}

	/**
	 * type = email: メールアドレスを取得
	 *
	 * @return string type = email: メールアドレス
	 */
	public function getEndpoint() {
		return $this->endpoint;
	}

	/**
	 * type = email: メールアドレスを設定
	 *
	 * @param string $endpoint type = email: メールアドレス
	 */
	public function setEndpoint($endpoint) {
		$this->endpoint = $endpoint;
	}

	/**
	 * type = email: メールアドレスを設定
	 *
	 * @param string $endpoint type = email: メールアドレス
	 * @return self
	 */
	public function withEndpoint($endpoint): self {
		$this->setEndpoint($endpoint);
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
	 * @return Subscribe
	 */
    static function build(array $array)
    {
        $item = new Subscribe();
        $item->setSubscribeId(isset($array['subscribeId']) ? $array['subscribeId'] : null);
        $item->setNotificationId(isset($array['notificationId']) ? $array['notificationId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setEndpoint(isset($array['endpoint']) ? $array['endpoint'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}