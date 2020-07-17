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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;

/**
 * 実行中のスタック
 *
 * @author Game Server Services, Inc.
 *
 */
class WorkingStack implements IModel {
	/**
     * @var string 実行中のスタック
	 */
	protected $stackId;

	/**
	 * 実行中のスタックを取得
	 *
	 * @return string|null 実行中のスタック
	 */
	public function getStackId(): ?string {
		return $this->stackId;
	}

	/**
	 * 実行中のスタックを設定
	 *
	 * @param string|null $stackId 実行中のスタック
	 */
	public function setStackId(?string $stackId) {
		$this->stackId = $stackId;
	}

	/**
	 * 実行中のスタックを設定
	 *
	 * @param string|null $stackId 実行中のスタック
	 * @return WorkingStack $this
	 */
	public function withStackId(?string $stackId): WorkingStack {
		$this->stackId = $stackId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return WorkingStack $this
	 */
	public function withOwnerId(?string $ownerId): WorkingStack {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string 実行中のスタック名
	 */
	protected $name;

	/**
	 * 実行中のスタック名を取得
	 *
	 * @return string|null 実行中のスタック名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 実行中のスタック名を設定
	 *
	 * @param string|null $name 実行中のスタック名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 実行中のスタック名を設定
	 *
	 * @param string|null $name 実行中のスタック名
	 * @return WorkingStack $this
	 */
	public function withName(?string $name): WorkingStack {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 実行に対して割り振られる一意な ID
	 */
	protected $workId;

	/**
	 * 実行に対して割り振られる一意な IDを取得
	 *
	 * @return string|null 実行に対して割り振られる一意な ID
	 */
	public function getWorkId(): ?string {
		return $this->workId;
	}

	/**
	 * 実行に対して割り振られる一意な IDを設定
	 *
	 * @param string|null $workId 実行に対して割り振られる一意な ID
	 */
	public function setWorkId(?string $workId) {
		$this->workId = $workId;
	}

	/**
	 * 実行に対して割り振られる一意な IDを設定
	 *
	 * @param string|null $workId 実行に対して割り振られる一意な ID
	 * @return WorkingStack $this
	 */
	public function withWorkId(?string $workId): WorkingStack {
		$this->workId = $workId;
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
	 * @return WorkingStack $this
	 */
	public function withCreatedAt(?int $createdAt): WorkingStack {
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
	 * @return WorkingStack $this
	 */
	public function withUpdatedAt(?int $updatedAt): WorkingStack {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "stackId" => $this->stackId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "workId" => $this->workId,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): WorkingStack {
        $model = new WorkingStack();
        $model->setStackId(isset($data["stackId"]) ? $data["stackId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setWorkId(isset($data["workId"]) ? $data["workId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}