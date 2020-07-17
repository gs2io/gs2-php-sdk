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
 * フレンドリクエスト
 *
 * @author Game Server Services, Inc.
 *
 */
class FriendRequest implements IModel {
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
	 * @return FriendRequest $this
	 */
	public function withUserId(?string $userId): FriendRequest {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $targetUserId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $targetUserId ユーザーID
	 */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $targetUserId ユーザーID
	 * @return FriendRequest $this
	 */
	public function withTargetUserId(?string $targetUserId): FriendRequest {
		$this->targetUserId = $targetUserId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "userId" => $this->userId,
            "targetUserId" => $this->targetUserId,
        );
    }

    public static function fromJson(array $data): FriendRequest {
        $model = new FriendRequest();
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserId(isset($data["targetUserId"]) ? $data["targetUserId"] : null);
        return $model;
    }
}