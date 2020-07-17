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

namespace Gs2\Dictionary\Model;

use Gs2\Core\Model\IModel;

/**
 * エントリーモデルマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class EntryModelMaster implements IModel {
	/**
     * @var string エントリーモデルマスター
	 */
	protected $entryModelId;

	/**
	 * エントリーモデルマスターを取得
	 *
	 * @return string|null エントリーモデルマスター
	 */
	public function getEntryModelId(): ?string {
		return $this->entryModelId;
	}

	/**
	 * エントリーモデルマスターを設定
	 *
	 * @param string|null $entryModelId エントリーモデルマスター
	 */
	public function setEntryModelId(?string $entryModelId) {
		$this->entryModelId = $entryModelId;
	}

	/**
	 * エントリーモデルマスターを設定
	 *
	 * @param string|null $entryModelId エントリーモデルマスター
	 * @return EntryModelMaster $this
	 */
	public function withEntryModelId(?string $entryModelId): EntryModelMaster {
		$this->entryModelId = $entryModelId;
		return $this;
	}
	/**
     * @var string エントリーモデル名
	 */
	protected $name;

	/**
	 * エントリーモデル名を取得
	 *
	 * @return string|null エントリーモデル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * エントリーモデル名を設定
	 *
	 * @param string|null $name エントリーモデル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * エントリーモデル名を設定
	 *
	 * @param string|null $name エントリーモデル名
	 * @return EntryModelMaster $this
	 */
	public function withName(?string $name): EntryModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string エントリーモデルマスターの説明
	 */
	protected $description;

	/**
	 * エントリーモデルマスターの説明を取得
	 *
	 * @return string|null エントリーモデルマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * エントリーモデルマスターの説明を設定
	 *
	 * @param string|null $description エントリーモデルマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * エントリーモデルマスターの説明を設定
	 *
	 * @param string|null $description エントリーモデルマスターの説明
	 * @return EntryModelMaster $this
	 */
	public function withDescription(?string $description): EntryModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string エントリーモデルのメタデータ
	 */
	protected $metadata;

	/**
	 * エントリーモデルのメタデータを取得
	 *
	 * @return string|null エントリーモデルのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * エントリーモデルのメタデータを設定
	 *
	 * @param string|null $metadata エントリーモデルのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * エントリーモデルのメタデータを設定
	 *
	 * @param string|null $metadata エントリーモデルのメタデータ
	 * @return EntryModelMaster $this
	 */
	public function withMetadata(?string $metadata): EntryModelMaster {
		$this->metadata = $metadata;
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
	 * @return EntryModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): EntryModelMaster {
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
	 * @return EntryModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): EntryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "entryModelId" => $this->entryModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): EntryModelMaster {
        $model = new EntryModelMaster();
        $model->setEntryModelId(isset($data["entryModelId"]) ? $data["entryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}