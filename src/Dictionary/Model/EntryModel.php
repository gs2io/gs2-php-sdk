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
 * エントリーモデル
 *
 * @author Game Server Services, Inc.
 *
 */
class EntryModel implements IModel {
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
	 * @return EntryModel $this
	 */
	public function withEntryModelId(?string $entryModelId): EntryModel {
		$this->entryModelId = $entryModelId;
		return $this;
	}
	/**
     * @var string エントリーの種類名
	 */
	protected $name;

	/**
	 * エントリーの種類名を取得
	 *
	 * @return string|null エントリーの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * エントリーの種類名を設定
	 *
	 * @param string|null $name エントリーの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * エントリーの種類名を設定
	 *
	 * @param string|null $name エントリーの種類名
	 * @return EntryModel $this
	 */
	public function withName(?string $name): EntryModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string エントリーの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * エントリーの種類のメタデータを取得
	 *
	 * @return string|null エントリーの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * エントリーの種類のメタデータを設定
	 *
	 * @param string|null $metadata エントリーの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * エントリーの種類のメタデータを設定
	 *
	 * @param string|null $metadata エントリーの種類のメタデータ
	 * @return EntryModel $this
	 */
	public function withMetadata(?string $metadata): EntryModel {
		$this->metadata = $metadata;
		return $this;
	}

    public function toJson(): array {
        return array(
            "entryModelId" => $this->entryModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
        );
    }

    public static function fromJson(array $data): EntryModel {
        $model = new EntryModel();
        $model->setEntryModelId(isset($data["entryModelId"]) ? $data["entryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        return $model;
    }
}