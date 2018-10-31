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

namespace Gs2\InGamePushNotification\Model;

/**
 * オンラインステータス
 *
 * @author Game Server Services, Inc.
 *
 */
class Status {

	/** @var string ユーザID */
	private $userId;

	/** @var string ステータス */
	private $status;

	/** @var string Firebaseトークン */
	private $fcmToken;

	/** @var int 登録日時 */
	private $createAt;

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
	 * ステータスを取得
	 *
	 * @return string ステータス
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string $status ステータス
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * ステータスを設定
	 *
	 * @param string $status ステータス
	 * @return self
	 */
	public function withStatus($status): self {
		$this->setStatus($status);
		return $this;
	}

	/**
	 * Firebaseトークンを取得
	 *
	 * @return string Firebaseトークン
	 */
	public function getFcmToken() {
		return $this->fcmToken;
	}

	/**
	 * Firebaseトークンを設定
	 *
	 * @param string $fcmToken Firebaseトークン
	 */
	public function setFcmToken($fcmToken) {
		$this->fcmToken = $fcmToken;
	}

	/**
	 * Firebaseトークンを設定
	 *
	 * @param string $fcmToken Firebaseトークン
	 * @return self
	 */
	public function withFcmToken($fcmToken): self {
		$this->setFcmToken($fcmToken);
		return $this;
	}

	/**
	 * 登録日時を取得
	 *
	 * @return int 登録日時
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 登録日時を設定
	 *
	 * @param int $createAt 登録日時
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 登録日時を設定
	 *
	 * @param int $createAt 登録日時
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
	 * @return Status
	 */
    static function build(array $array)
    {
        $item = new Status();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setStatus(isset($array['status']) ? $array['status'] : null);
        $item->setFcmToken(isset($array['fcmToken']) ? $array['fcmToken'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}