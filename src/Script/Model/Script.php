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

namespace Gs2\Script\Model;

use Gs2\Core\Model\IModel;

/**
 * スクリプト
 *
 * @author Game Server Services, Inc.
 *
 */
class Script implements IModel {
	/**
     * @var string スクリプト
	 */
	protected $scriptId;

	/**
	 * スクリプトを取得
	 *
	 * @return string|null スクリプト
	 */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}

	/**
	 * スクリプトを設定
	 *
	 * @param string|null $scriptId スクリプト
	 */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}

	/**
	 * スクリプトを設定
	 *
	 * @param string|null $scriptId スクリプト
	 * @return Script $this
	 */
	public function withScriptId(?string $scriptId): Script {
		$this->scriptId = $scriptId;
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
	 * @return Script $this
	 */
	public function withOwnerId(?string $ownerId): Script {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string スクリプト名
	 */
	protected $name;

	/**
	 * スクリプト名を取得
	 *
	 * @return string|null スクリプト名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string|null $name スクリプト名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * スクリプト名を設定
	 *
	 * @param string|null $name スクリプト名
	 * @return Script $this
	 */
	public function withName(?string $name): Script {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string 説明文
	 */
	protected $description;

	/**
	 * 説明文を取得
	 *
	 * @return string|null 説明文
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string|null $description 説明文
	 * @return Script $this
	 */
	public function withDescription(?string $description): Script {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string Luaスクリプト
	 */
	protected $script;

	/**
	 * Luaスクリプトを取得
	 *
	 * @return string|null Luaスクリプト
	 */
	public function getScript(): ?string {
		return $this->script;
	}

	/**
	 * Luaスクリプトを設定
	 *
	 * @param string|null $script Luaスクリプト
	 */
	public function setScript(?string $script) {
		$this->script = $script;
	}

	/**
	 * Luaスクリプトを設定
	 *
	 * @param string|null $script Luaスクリプト
	 * @return Script $this
	 */
	public function withScript(?string $script): Script {
		$this->script = $script;
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
	 * @return Script $this
	 */
	public function withCreatedAt(?int $createdAt): Script {
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
	 * @return Script $this
	 */
	public function withUpdatedAt(?int $updatedAt): Script {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "scriptId" => $this->scriptId,
            "ownerId" => $this->ownerId,
            "name" => $this->name,
            "description" => $this->description,
            "script" => $this->script,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Script {
        $model = new Script();
        $model->setScriptId(isset($data["scriptId"]) ? $data["scriptId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setScript(isset($data["script"]) ? $data["script"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}