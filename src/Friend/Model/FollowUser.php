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
 * フォローしているユーザー
 *
 * @author Game Server Services, Inc.
 *
 */
class FollowUser implements IModel {
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
	 * @return FollowUser $this
	 */
	public function withUserId(?string $userId): FollowUser {
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
	 * @return FollowUser $this
	 */
	public function withPublicProfile(?string $publicProfile): FollowUser {
		$this->publicProfile = $publicProfile;
		return $this;
	}
	/**
     * @var string フォロワー向けに公開されるプロフィール
	 */
	protected $followerProfile;

	/**
	 * フォロワー向けに公開されるプロフィールを取得
	 *
	 * @return string|null フォロワー向けに公開されるプロフィール
	 */
	public function getFollowerProfile(): ?string {
		return $this->followerProfile;
	}

	/**
	 * フォロワー向けに公開されるプロフィールを設定
	 *
	 * @param string|null $followerProfile フォロワー向けに公開されるプロフィール
	 */
	public function setFollowerProfile(?string $followerProfile) {
		$this->followerProfile = $followerProfile;
	}

	/**
	 * フォロワー向けに公開されるプロフィールを設定
	 *
	 * @param string|null $followerProfile フォロワー向けに公開されるプロフィール
	 * @return FollowUser $this
	 */
	public function withFollowerProfile(?string $followerProfile): FollowUser {
		$this->followerProfile = $followerProfile;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "publicProfile" => $this->publicProfile,
            "followerProfile" => $this->followerProfile,
        );
    }

    public static function fromJson(array $data): FollowUser {
        $model = new FollowUser();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPublicProfile(isset($data["publicProfile"]) ? $data["publicProfile"] : null);
        $model->setFollowerProfile(isset($data["followerProfile"]) ? $data["followerProfile"] : null);
        return $model;
    }
}