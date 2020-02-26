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
 * 購読
 *
 * @author Game Server Services, Inc.
 *
 */
class Subscribe implements IModel {
	/**
     * @var string 購読
	 */
	protected $subscribeId;

	/**
	 * 購読を取得
	 *
	 * @return string|null 購読
	 */
	public function getSubscribeId(): ?string {
		return $this->subscribeId;
	}

	/**
	 * 購読を設定
	 *
	 * @param string|null $subscribeId 購読
	 */
	public function setSubscribeId(?string $subscribeId) {
		$this->subscribeId = $subscribeId;
	}

	/**
	 * 購読を設定
	 *
	 * @param string|null $subscribeId 購読
	 * @return Subscribe $this
	 */
	public function withSubscribeId(?string $subscribeId): Subscribe {
		$this->subscribeId = $subscribeId;
		return $this;
	}
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
	 * @return Subscribe $this
	 */
	public function withCategoryName(?string $categoryName): Subscribe {
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
	 * @return Subscribe $this
	 */
	public function withUserId(?string $userId): Subscribe {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string[] 購読されるユーザIDリスト
	 */
	protected $targetUserIds;

	/**
	 * 購読されるユーザIDリストを取得
	 *
	 * @return string[]|null 購読されるユーザIDリスト
	 */
	public function getTargetUserIds(): ?array {
		return $this->targetUserIds;
	}

	/**
	 * 購読されるユーザIDリストを設定
	 *
	 * @param string[]|null $targetUserIds 購読されるユーザIDリスト
	 */
	public function setTargetUserIds(?array $targetUserIds) {
		$this->targetUserIds = $targetUserIds;
	}

	/**
	 * 購読されるユーザIDリストを設定
	 *
	 * @param string[]|null $targetUserIds 購読されるユーザIDリスト
	 * @return Subscribe $this
	 */
	public function withTargetUserIds(?array $targetUserIds): Subscribe {
		$this->targetUserIds = $targetUserIds;
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
	 * @return Subscribe $this
	 */
	public function withCreatedAt(?int $createdAt): Subscribe {
		$this->createdAt = $createdAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "subscribeId" => $this->subscribeId,
            "categoryName" => $this->categoryName,
            "userId" => $this->userId,
            "targetUserIds" => $this->targetUserIds,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Subscribe {
        $model = new Subscribe();
        $model->setSubscribeId(isset($data["subscribeId"]) ? $data["subscribeId"] : null);
        $model->setCategoryName(isset($data["categoryName"]) ? $data["categoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setTargetUserIds(isset($data["targetUserIds"]) ? $data["targetUserIds"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}