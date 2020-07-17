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

namespace Gs2\Friend\Model;

use Gs2\Core\Model\IModel;

/**
 * フレンドのユーザー
 *
 * @author Game Server Services, Inc.
 *
 */
class FriendUser implements IModel {
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
	 * @return FriendUser $this
	 */
	public function withUserId(?string $userId): FriendUser {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string 公開されるプロフィール
	 */
	protected $publicProfile;

	/**
	 * 公開されるプロフィールを取得
	 *
	 * @return string|null 公開されるプロフィール
	 */
	public function getPublicProfile(): ?string {
		return $this->publicProfile;
	}

	/**
	 * 公開されるプロフィールを設定
	 *
	 * @param string|null $publicProfile 公開されるプロフィール
	 */
	public function setPublicProfile(?string $publicProfile) {
		$this->publicProfile = $publicProfile;
	}

	/**
	 * 公開されるプロフィールを設定
	 *
	 * @param string|null $publicProfile 公開されるプロフィール
	 * @return FriendUser $this
	 */
	public function withPublicProfile(?string $publicProfile): FriendUser {
		$this->publicProfile = $publicProfile;
		return $this;
	}
	/**
     * @var string フレンド向けに公開されるプロフィール
	 */
	protected $friendProfile;

	/**
	 * フレンド向けに公開されるプロフィールを取得
	 *
	 * @return string|null フレンド向けに公開されるプロフィール
	 */
	public function getFriendProfile(): ?string {
		return $this->friendProfile;
	}

	/**
	 * フレンド向けに公開されるプロフィールを設定
	 *
	 * @param string|null $friendProfile フレンド向けに公開されるプロフィール
	 */
	public function setFriendProfile(?string $friendProfile) {
		$this->friendProfile = $friendProfile;
	}

	/**
	 * フレンド向けに公開されるプロフィールを設定
	 *
	 * @param string|null $friendProfile フレンド向けに公開されるプロフィール
	 * @return FriendUser $this
	 */
	public function withFriendProfile(?string $friendProfile): FriendUser {
		$this->friendProfile = $friendProfile;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "publicProfile" => $this->publicProfile,
            "friendProfile" => $this->friendProfile,
        );
    }

    public static function fromJson(array $data): FriendUser {
        $model = new FriendUser();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPublicProfile(isset($data["publicProfile"]) ? $data["publicProfile"] : null);
        $model->setFriendProfile(isset($data["friendProfile"]) ? $data["friendProfile"] : null);
        return $model;
    }
}