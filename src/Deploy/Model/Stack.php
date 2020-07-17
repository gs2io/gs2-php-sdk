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
 * スタック
 *
 * @author Game Server Services, Inc.
 *
 */
class Stack implements IModel {
	/**
     * @var string スタック
	 */
	protected $stackId;

	/**
	 * スタックを取得
	 *
	 * @return string|null スタック
	 */
	public function getStackId(): ?string {
		return $this->stackId;
	}

	/**
	 * スタックを設定
	 *
	 * @param string|null $stackId スタック
	 */
	public function setStackId(?string $stackId) {
		$this->stackId = $stackId;
	}

	/**
	 * スタックを設定
	 *
	 * @param string|null $stackId スタック
	 * @return Stack $this
	 */
	public function withStackId(?string $stackId): Stack {
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
	 * @return Stack $this
	 */
	public function withOwnerId(?string $ownerId): Stack {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string スタック名
	 */
	protected $name;

	/**
	 * スタック名を取得
	 *
	 * @return string|null スタック名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スタック名を設定
	 *
	 * @param string|null $name スタック名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スタック名を設定
	 *
	 * @param string|null $name スタック名
	 * @return Stack $this
	 */
	public function withName(?string $name): Stack {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string スタックの説明
	 */
	protected $description;

	/**
	 * スタックの説明を取得
	 *
	 * @return string|null スタックの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * スタックの説明を設定
	 *
	 * @param string|null $description スタックの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * スタックの説明を設定
	 *
	 * @param string|null $description スタックの説明
	 * @return Stack $this
	 */
	public function withDescription(?string $description): Stack {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string テンプレートデータ
	 */
	protected $template;

	/**
	 * テンプレートデータを取得
	 *
	 * @return string|null テンプレートデータ
	 */
	public function getTemplate(): ?string {
		return $this->template;
	}

	/**
	 * テンプレートデータを設定
	 *
	 * @param string|null $template テンプレートデータ
	 */
	public function setTemplate(?string $template) {
		$this->template = $template;
	}

	/**
	 * テンプレートデータを設定
	 *
	 * @param string|null $template テンプレートデータ
	 * @return Stack $this
	 */
	public function withTemplate(?string $template): Stack {
		$this->template = $template;
		return $this;
	}
	/**
     * @var string 実行状態
	 */
	protected $status;

	/**
	 * 実行状態を取得
	 *
	 * @return string|null 実行状態
	 */
	public function getStatus(): ?string {
		return $this->status;
	}

	/**
	 * 実行状態を設定
	 *
	 * @param string|null $status 実行状態
	 */
	public function setStatus(?string $status) {
		$this->status = $status;
	}

	/**
	 * 実行状態を設定
	 *
	 * @param string|null $status 実行状態
	 * @return Stack $this
	 */
	public function withStatus(?string $status): Stack {
		$this->status = $status;
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
	 * @return Stack $this
	 */
	public function withCreatedAt(?int $createdAt): Stack {
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
	 * @return Stack $this
	 */
	public function withUpdatedAt(?int $updatedAt): Stack {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "stackId" => $this->stackId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "template" => $this->template,
            "status" => $this->status,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Stack {
        $model = new Stack();
        $model->setStackId(isset($data["stackId"]) ? $data["stackId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setTemplate(isset($data["template"]) ? $data["template"] : null);
        $model->setStatus(isset($data["status"]) ? $data["status"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}