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

namespace Gs2\Quest\Model;

use Gs2\Core\Model\IModel;

/**
 * クエスト進行
 *
 * @author Game Server Services, Inc.
 *
 */
class CompletedQuestList implements IModel {
	/**
     * @var string クエスト進行
	 */
	protected $completedQuestListId;

	/**
	 * クエスト進行を取得
	 *
	 * @return string|null クエスト進行
	 */
	public function getCompletedQuestListId(): ?string {
		return $this->completedQuestListId;
	}

	/**
	 * クエスト進行を設定
	 *
	 * @param string|null $completedQuestListId クエスト進行
	 */
	public function setCompletedQuestListId(?string $completedQuestListId) {
		$this->completedQuestListId = $completedQuestListId;
	}

	/**
	 * クエスト進行を設定
	 *
	 * @param string|null $completedQuestListId クエスト進行
	 * @return CompletedQuestList $this
	 */
	public function withCompletedQuestListId(?string $completedQuestListId): CompletedQuestList {
		$this->completedQuestListId = $completedQuestListId;
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
	 * @return CompletedQuestList $this
	 */
	public function withUserId(?string $userId): CompletedQuestList {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string クエストグループ名
	 */
	protected $questGroupName;

	/**
	 * クエストグループ名を取得
	 *
	 * @return string|null クエストグループ名
	 */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}

	/**
	 * クエストグループ名を設定
	 *
	 * @param string|null $questGroupName クエストグループ名
	 */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}

	/**
	 * クエストグループ名を設定
	 *
	 * @param string|null $questGroupName クエストグループ名
	 * @return CompletedQuestList $this
	 */
	public function withQuestGroupName(?string $questGroupName): CompletedQuestList {
		$this->questGroupName = $questGroupName;
		return $this;
	}
	/**
     * @var string[] 攻略済みのクエスト名一覧のリスト
	 */
	protected $completeQuestNames;

	/**
	 * 攻略済みのクエスト名一覧のリストを取得
	 *
	 * @return string[]|null 攻略済みのクエスト名一覧のリスト
	 */
	public function getCompleteQuestNames(): ?array {
		return $this->completeQuestNames;
	}

	/**
	 * 攻略済みのクエスト名一覧のリストを設定
	 *
	 * @param string[]|null $completeQuestNames 攻略済みのクエスト名一覧のリスト
	 */
	public function setCompleteQuestNames(?array $completeQuestNames) {
		$this->completeQuestNames = $completeQuestNames;
	}

	/**
	 * 攻略済みのクエスト名一覧のリストを設定
	 *
	 * @param string[]|null $completeQuestNames 攻略済みのクエスト名一覧のリスト
	 * @return CompletedQuestList $this
	 */
	public function withCompleteQuestNames(?array $completeQuestNames): CompletedQuestList {
		$this->completeQuestNames = $completeQuestNames;
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
	 * @return CompletedQuestList $this
	 */
	public function withCreatedAt(?int $createdAt): CompletedQuestList {
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
	 * @return CompletedQuestList $this
	 */
	public function withUpdatedAt(?int $updatedAt): CompletedQuestList {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "completedQuestListId" => $this->completedQuestListId,
            "userId" => $this->userId,
            "questGroupName" => $this->questGroupName,
            "completeQuestNames" => $this->completeQuestNames,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): CompletedQuestList {
        $model = new CompletedQuestList();
        $model->setCompletedQuestListId(isset($data["completedQuestListId"]) ? $data["completedQuestListId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setQuestGroupName(isset($data["questGroupName"]) ? $data["questGroupName"] : null);
        $model->setCompleteQuestNames(isset($data["completeQuestNames"]) ? $data["completeQuestNames"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}