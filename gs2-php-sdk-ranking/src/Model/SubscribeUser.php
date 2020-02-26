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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;

/**
 * 購読対象
 *
 * @author Game Server Services, Inc.
 *
 */
class SubscribeUser implements IModel {
	/**
     * @var string カテゴリ名
	 */
	protected $categoryName;

	/**
	 * カテゴリ名を取得
	 *
	 * @return string|null カテゴリ名
	 */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $categoryName カテゴリ名
	 * @return SubscribeUser $this
	 */
	public function withCategoryName(?string $categoryName): SubscribeUser {
		$this->categoryName = $categoryName;
		return $this;
	}
	/**
     * @var string 購読するユーザID
	 */
	protected $userId;

	/**
	 * 購読するユーザIDを取得
	 *
	 * @return string|null 購読するユーザID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * 購読するユーザIDを設定
	 *
	 * @param string|null $userId 購読するユーザID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * 購読するユーザIDを設定
	 *
	 * @param string|null $userId 購読するユーザID
	 * @return SubscribeUser $this
	 */
	public function withUserId(?string $userId): SubscribeUser {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string 購読されるユーザID
	 */
	protected $targetUserId;

	/**
	 * 購読されるユーザIDを取得
	 *
	 * @return string|null 購読されるユーザID
	 */
	public function getTargetUserId(): ?string {
		return $this->targetUserId;
	}

	/**
	 * 購読されるユーザIDを設定
	 *
	 * @param string|null $targetUserId 購読されるユーザID
	 */
	public function setTargetUserId(?string $targetUserId) {
		$this->targetUserId = $targetUserId;
	}

	/**
	 * 購読されるユーザIDを設定
	 *
	 * @param string|null $targetUserId 購読されるユーザID
	 * @return SubscribeUser $this
	 */
	public function withTargetUserId(?string $targetUserId): SubscribeUser {
		$this->targetUserId = $targetUserId;
		return $this;
	}

    public function toJson(): array {
        return array(
            "categoryName" => $this->categoryName,
            "userId" => $this->userId,
            "targetUserId" => $this->targetUserId,
        );
    }

    public static function fromJson(array $data): SubscribeUser {
        $model = new SubscribeUser();
        $model->setCategoryName(isset($data["categoryName"]) ? $data["categoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserId(isset($data["targetUserId"]) ? $data["targetUserId"] : null);
        return $model;
    }
}