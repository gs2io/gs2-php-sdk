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

namespace Gs2\Chat\Model;

/**
 * 購読
 *
 * @author Game Server Services, Inc.
 *
 */
class Subscribe {

	/** @var string ルームID */
	private $roomId;

	/** @var string ユーザID */
	private $userId;

	/** @var bool オフライン転送を使用するか */
	private $enableOfflineTransfer;

	/** @var string 通知音 */
	private $offlineTransferSound;

	/** @var int 購読日時(エポック秒) */
	private $subscribeAt;

	/**
	 * ルームIDを取得
	 *
	 * @return string ルームID
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 * @return self
	 */
	public function withRoomId($roomId): self {
		$this->setRoomId($roomId);
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
	 * オフライン転送を使用するかを取得
	 *
	 * @return bool オフライン転送を使用するか
	 */
	public function getEnableOfflineTransfer() {
		return $this->enableOfflineTransfer;
	}

	/**
	 * オフライン転送を使用するかを設定
	 *
	 * @param bool $enableOfflineTransfer オフライン転送を使用するか
	 */
	public function setEnableOfflineTransfer($enableOfflineTransfer) {
		$this->enableOfflineTransfer = $enableOfflineTransfer;
	}

	/**
	 * オフライン転送を使用するかを設定
	 *
	 * @param bool $enableOfflineTransfer オフライン転送を使用するか
	 * @return self
	 */
	public function withEnableOfflineTransfer($enableOfflineTransfer): self {
		$this->setEnableOfflineTransfer($enableOfflineTransfer);
		return $this;
	}

	/**
	 * 通知音を取得
	 *
	 * @return string 通知音
	 */
	public function getOfflineTransferSound() {
		return $this->offlineTransferSound;
	}

	/**
	 * 通知音を設定
	 *
	 * @param string $offlineTransferSound 通知音
	 */
	public function setOfflineTransferSound($offlineTransferSound) {
		$this->offlineTransferSound = $offlineTransferSound;
	}

	/**
	 * 通知音を設定
	 *
	 * @param string $offlineTransferSound 通知音
	 * @return self
	 */
	public function withOfflineTransferSound($offlineTransferSound): self {
		$this->setOfflineTransferSound($offlineTransferSound);
		return $this;
	}

	/**
	 * 購読日時(エポック秒)を取得
	 *
	 * @return int 購読日時(エポック秒)
	 */
	public function getSubscribeAt() {
		return $this->subscribeAt;
	}

	/**
	 * 購読日時(エポック秒)を設定
	 *
	 * @param int $subscribeAt 購読日時(エポック秒)
	 */
	public function setSubscribeAt($subscribeAt) {
		$this->subscribeAt = $subscribeAt;
	}

	/**
	 * 購読日時(エポック秒)を設定
	 *
	 * @param int $subscribeAt 購読日時(エポック秒)
	 * @return self
	 */
	public function withSubscribeAt($subscribeAt): self {
		$this->setSubscribeAt($subscribeAt);
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
        $item->setRoomId(isset($array['roomId']) ? $array['roomId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setEnableOfflineTransfer(isset($array['enableOfflineTransfer']) ? $array['enableOfflineTransfer'] : null);
        $item->setOfflineTransferSound(isset($array['offlineTransferSound']) ? $array['offlineTransferSound'] : null);
        $item->setSubscribeAt(isset($array['subscribeAt']) ? $array['subscribeAt'] : null);
        return $item;
    }

}