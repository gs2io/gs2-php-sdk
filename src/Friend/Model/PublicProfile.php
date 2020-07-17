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
 * 公開プロフィール
 *
 * @author Game Server Services, Inc.
 *
 */
class PublicProfile implements IModel {
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
	 * @return PublicProfile $this
	 */
	public function withUserId(?string $userId): PublicProfile {
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
	 * @return PublicProfile $this
	 */
	public function withPublicProfile(?string $publicProfile): PublicProfile {
		$this->publicProfile = $publicProfile;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "publicProfile" => $this->publicProfile,
        );
    }

    public static function fromJson(array $data): PublicProfile {
        $model = new PublicProfile();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setPublicProfile(isset($data["publicProfile"]) ? $data["publicProfile"] : null);
        return $model;
    }
}