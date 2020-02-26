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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;

/**
 * ゲームプレイヤーアカウント
 *
 * @author Game Server Services, Inc.
 *
 */
class Account implements IModel {
	/**
     * @var string ゲームプレイヤーアカウント
	 */
	protected $accountId;

	/**
	 * ゲームプレイヤーアカウントを取得
	 *
	 * @return string|null ゲームプレイヤーアカウント
	 */
	public function getAccountId(): ?string {
		return $this->accountId;
	}

	/**
	 * ゲームプレイヤーアカウントを設定
	 *
	 * @param string|null $accountId ゲームプレイヤーアカウント
	 */
	public function setAccountId(?string $accountId) {
		$this->accountId = $accountId;
	}

	/**
	 * ゲームプレイヤーアカウントを設定
	 *
	 * @param string|null $accountId ゲームプレイヤーアカウント
	 * @return Account $this
	 */
	public function withAccountId(?string $accountId): Account {
		$this->accountId = $accountId;
		return $this;
	}
	/**
     * @var string アカウントID
	 */
	protected $userId;

	/**
	 * アカウントIDを取得
	 *
	 * @return string|null アカウントID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * アカウントIDを設定
	 *
	 * @param string|null $userId アカウントID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * アカウントIDを設定
	 *
	 * @param string|null $userId アカウントID
	 * @return Account $this
	 */
	public function withUserId(?string $userId): Account {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string パスワード
	 */
	protected $password;

	/**
	 * パスワードを取得
	 *
	 * @return string|null パスワード
	 */
	public function getPassword(): ?string {
		return $this->password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 */
	public function setPassword(?string $password) {
		$this->password = $password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string|null $password パスワード
	 * @return Account $this
	 */
	public function withPassword(?string $password): Account {
		$this->password = $password;
		return $this;
	}
	/**
     * @var int 現在時刻に対する補正値（現在時刻を起点とした秒数）
	 */
	protected $timeOffset;

	/**
	 * 現在時刻に対する補正値（現在時刻を起点とした秒数）を取得
	 *
	 * @return int|null 現在時刻に対する補正値（現在時刻を起点とした秒数）
	 */
	public function getTimeOffset(): ?int {
		return $this->timeOffset;
	}

	/**
	 * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
	 *
	 * @param int|null $timeOffset 現在時刻に対する補正値（現在時刻を起点とした秒数）
	 */
	public function setTimeOffset(?int $timeOffset) {
		$this->timeOffset = $timeOffset;
	}

	/**
	 * 現在時刻に対する補正値（現在時刻を起点とした秒数）を設定
	 *
	 * @param int|null $timeOffset 現在時刻に対する補正値（現在時刻を起点とした秒数）
	 * @return Account $this
	 */
	public function withTimeOffset(?int $timeOffset): Account {
		$this->timeOffset = $timeOffset;
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
	 * @return Account $this
	 */
	public function withCreatedAt(?int $createdAt): Account {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "accountId" => $this->accountId,
            "userId" => $this->userId,
            "password" => $this->password,
            "timeOffset" => $this->timeOffset,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Account {
        $model = new Account();
        $model->setAccountId(isset($data["accountId"]) ? $data["accountId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPassword(isset($data["password"]) ? $data["password"] : null);
        $model->setTimeOffset(isset($data["timeOffset"]) ? $data["timeOffset"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}