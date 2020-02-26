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
 * プロフィール
 *
 * @author Game Server Services, Inc.
 *
 */
class Profile implements IModel {
	/**
     * @var string プロフィール
	 */
	protected $profileId;

	/**
	 * プロフィールを取得
	 *
	 * @return string|null プロフィール
	 */
	public function getProfileId(): ?string {
		return $this->profileId;
	}

	/**
	 * プロフィールを設定
	 *
	 * @param string|null $profileId プロフィール
	 */
	public function setProfileId(?string $profileId) {
		$this->profileId = $profileId;
	}

	/**
	 * プロフィールを設定
	 *
	 * @param string|null $profileId プロフィール
	 * @return Profile $this
	 */
	public function withProfileId(?string $profileId): Profile {
		$this->profileId = $profileId;
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
	 * @return Profile $this
	 */
	public function withUserId(?string $userId): Profile {
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
	 * @return Profile $this
	 */
	public function withPublicProfile(?string $publicProfile): Profile {
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
	 * @return Profile $this
	 */
	public function withFollowerProfile(?string $followerProfile): Profile {
		$this->followerProfile = $followerProfile;
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
	 * @return Profile $this
	 */
	public function withFriendProfile(?string $friendProfile): Profile {
		$this->friendProfile = $friendProfile;
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
	 * @return Profile $this
	 */
	public function withCreatedAt(?int $createdAt): Profile {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Profile $this
	 */
	public function withUpdatedAt(?int $updatedAt): Profile {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "profileId" => $this->profileId,
            "userId" => $this->userId,
            "publicProfile" => $this->publicProfile,
            "followerProfile" => $this->followerProfile,
            "friendProfile" => $this->friendProfile,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Profile {
        $model = new Profile();
        $model->setProfileId(isset($data["profileId"]) ? $data["profileId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPublicProfile(isset($data["publicProfile"]) ? $data["publicProfile"] : null);
        $model->setFollowerProfile(isset($data["followerProfile"]) ? $data["followerProfile"] : null);
        $model->setFriendProfile(isset($data["friendProfile"]) ? $data["friendProfile"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}